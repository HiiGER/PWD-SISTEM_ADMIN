<?php
include('conn.php');


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT username, password, role FROM users WHERE email = ?";
    
    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param("s", $email);

        $stmt->execute();
        
        $stmt->bind_result($username, $hashed_password, $role);
        

        if ($stmt->fetch()) {

            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role; 
                
                if ($role === 'admin') {
                    header("Location: ../admin/dashboardAdmin.php");
                } else {
                    header("Location: ../user/dashboard.php");
                }
                exit();
            } else {
                header("Location: ../Login.php");
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that email address.";
        }


        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
}
?>
