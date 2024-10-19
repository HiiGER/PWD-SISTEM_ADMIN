<?php
session_start();
include('conn.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    
    $sql = "UPDATE users SET name=?, email=?, role=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $name, $email, $role, $id);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "User updated successfully!";
            header("Location: ../Admin/ManageUser.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
