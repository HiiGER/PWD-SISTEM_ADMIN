<?php
session_start();
include('conn.php'); 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "DELETE FROM seminars WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Seminar deleted successfully!";
            header("Location: ../Admin/ManageSeminars.php");
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
