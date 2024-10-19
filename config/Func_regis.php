<?php

include('conn.php');


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $act =$_POST['act'];

    
    if ($password != $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $role = $_POST['role']; 

    
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);
        if ($stmt->execute()) {
            
            $_SESSION['username'] = $username; 
            $_SESSION['success_message'] = "Registration successful!"; 
            if($act = 'regis'){
                header("Location: ../user/dashboard.php");
                exit(); 
            }else{
                header("Location: ../Admin/ManageUser.php");
                exit();
            }
            

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
