<?php
session_start();
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seminar_id = $_POST['seminar_id'];
    $user_id = $_POST['user_id'];

    // Insert into User_seminars
    $sql = "INSERT INTO User_seminars (seminar_id, user_id) VALUES (?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ii", $seminar_id, $user_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "User added to seminar successfully!";
        } else {
            $_SESSION['error_message'] = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Error preparing statement: " . $conn->error;
    }

    // Redirect back to the seminars page
    header("Location: ../admin/AddParticipan.php");
    exit();
}
?>
