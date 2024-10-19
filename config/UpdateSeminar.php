<?php
session_start();
include('conn.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $capacity = $_POST['capacity'];

    
    $sql = "UPDATE seminars SET title=?, description=?, date=?, capacity=? WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $title, $description, $date, $capacity, $id);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Seminar updated successfully!";
            header("Location: ../Admin/seminars.php");
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
