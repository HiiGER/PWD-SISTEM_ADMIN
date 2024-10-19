<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $capacity = $_POST['capacity'];

    
    $sql = "INSERT INTO seminars (title, description, date, capacity) VALUES (?, ?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        
        $stmt->bind_param("sssi", $title, $description, $date, $capacity);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Seminar added successfully!";
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
