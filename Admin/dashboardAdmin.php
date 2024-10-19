<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../asset/style.css">

  </head>
  <body>
    <!-- Topbar -->
    <div class="topbar">
      <h2 class="text-center">SeminarKuApp</h2>
    </div>

    <div class="wrapper">
      <!-- Sidebar -->

      
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <span class="fs-4">SeminarKuApp</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="dashboardAdmin.php" class="nav-link active" aria-current="page">
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
            <a href="deletecUser.php" class="nav-link link-dark">
              Delete User 
            </a>
          </li>
        </ul>
      </div>


      <!-- Content -->
      <div class="content">
        <h1>wellcome to work branch Admin <?php echo $_SESSION["username"]; ?> !!</h1>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
