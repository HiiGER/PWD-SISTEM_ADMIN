<?php
include('../config/conn.php'); 

session_start();

if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // Clear the message after displaying it
}


if (!isset($_SESSION['username'])) {
    echo "No user logged in. Please log in first.";
    exit;
}

$username = $_SESSION["username"];


$sql = "SELECT id FROM users WHERE username = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id);
    $stmt->fetch();
    $stmt->close();
}
if (!isset($user_id)) {
    echo "User ID not found for username: " . $username;
    exit;
}


$sql = "SELECT seminars.title, seminars.description, seminars.date 
        FROM user_seminars 
        JOIN seminars ON user_seminars.seminar_id = seminars.id 
        WHERE user_seminars.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Seminar Saya</title>
    <link rel="stylesheet" href="../asset/style.css">
  </head>
  <body>
    <!-- Topbar -->
    <div class="topbar">
      <h2 class="text-center">Seminar Saya</h2>
    </div>

    <div class="wrapper">
      <!-- Sidebar -->
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
          <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <span class="fs-4">SeminarKuApp</span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="seminarsaya.php" class="nav-link active" aria-current="page">
                Seminar Saya
              </a>
            </li>
          </ul>
          <hr>
          <ul class="nav flex-column">
            <li>
              <a href="../Login.php" class="nav-link link-dark">Logout</a>
            </li>
          </ul>
      </div>

      <!-- Content -->
      <div class="content">
        <h2><?php echo $_SESSION["username"]; ?>, berikut seminar yang Anda ikuti:</h2>

        <!-- Display the seminars in a table -->
        <table class="table table-bordered mt-4">
          <thead>
            <tr>
              <th>Judul Seminar</th>
              <th>Deskripsi</th>
              <th>Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Belum mengikuti seminar</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

<?php
$stmt->close();
$conn->close();
?>
