<?php
session_start();
include('conn.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $conn->begin_transaction();

    try {
        
        $sqlFetch = "SELECT * FROM users WHERE id=?";
        if ($stmtFetch = $conn->prepare($sqlFetch)) {
            $stmtFetch->bind_param("i", $id);
            $stmtFetch->execute();
            $result = $stmtFetch->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $name = $user['name'];
                $email = $user['email'];
                $role = $user['role'];

                
                $sqlInsertDeleted = "INSERT INTO userdeleted (name, email, role) VALUES (?, ?, ?)";
                if ($stmtInsert = $conn->prepare($sqlInsertDeleted)) {
                    $stmtInsert->bind_param("sss", $name, $email, $role);
                    $stmtInsert->execute();
                    $stmtInsert->close();
                } else {
                    throw new Exception("Error inserting data into userdeleted: " . $conn->error);
                }

                $sqlDelete = "DELETE FROM users WHERE id=?";
                if ($stmtDelete = $conn->prepare($sqlDelete)) {
                    $stmtDelete->bind_param("i", $id);
                    $stmtDelete->execute();
                    $stmtDelete->close();
                } else {
                    throw new Exception("Error deleting user: " . $conn->error);
                }

                $conn->commit();
                $_SESSION['success_message'] = "User deleted and backup created successfully!";
                header("Location: ../Admin/ManageUser.php");
                exit();
            } else {
                throw new Exception("User not found.");
            }

            $stmtFetch->close();
        } else {
            throw new Exception("Error fetching user: " . $conn->error);
        }

    } catch (Exception $e) {
        
        $conn->rollback();
        echo "Failed to delete user: " . $e->getMessage();
    }

    $conn->close();
}
?>
