<?php
session_start();
include('../config/conn.php'); // Include your database connection file

// Fetch users from the database
$sql = "SELECT * FROM userdeleted";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Deleted</title>
    <link rel="stylesheet" href="../asset/style.css">
  </head>
  <body>
    <!-- Topbar -->
    <div class="topbar">
      <h2 class="text-center">SeminarKuApp</h2>
    </div>
    
    <div class="wrapper">
    
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <span class="fs-4">SeminarKuApp</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="dashboardAdmin.php" class="nav-link link-dark">
              Dashboard 
            </a>
          </li>
          <li>
            <a href="ManageUser.php" class="nav-link link-dark">
              Manage Participants 
            </a>
          </li>
          <li>
            <a href="AddParticipan.php" class="nav-link link-dark">
              Add to Seminars 
            </a>
          </li>
          <li>
            <a href="seminars.php" class="nav-link link-dark">
              Manage Seminars 
            </a>
          </li>
        </ul>
        <hr>
        <ul class="nav flex-column">
          <li>
            <a href="deletecUser.php" class="nav-link active" aria-current="page">
              Delete User 
            </a>
          </li>
        </ul>
      </div>
      
      <div class="container mt-5">
        <h3>Manage Users</h3>

        <table class="table table-striped table-bordered mt-3">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Email</th>
              <th>Role</th>
              <th>delete at</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>" . $row['deleted_at'] . "</td>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>


</html>



