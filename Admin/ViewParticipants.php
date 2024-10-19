<?php
session_start();
include('../config/conn.php');

$seminar_id = $_GET['seminar_id'];

// Fetch seminar participants
$sql = "SELECT users.username FROM User_seminars 
        JOIN users ON User_seminars.user_id = users.id 
        WHERE seminar_id = ?";
        
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $seminar_id);
    $stmt->execute();
    $result = $stmt->get_result();
}

$title = "SELECT title FROM seminars WHERE id = ?";
if ($steatment = $conn->prepare($title)) {
    $steatment->bind_param("i", $seminar_id);
    $steatment->execute();
    $steatment->bind_result($seminar_title);
    $steatment->fetch();
    $steatment->close();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../asset/style.css">
    <title>Lihat Peserta</title>
</head>
<body>

    <div class="topbar">
        <h2 class="text-center">SeminarKuApp</h2>
    </div>

    <div class="container mt-5">
        <h3>Peserta dalam seminar : <?php echo $seminar_title; ?></h3>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['username'] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td class='text-center'>No participants found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="AddParticipan.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
