<?php
session_start();


if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); 
}

if (!isset($_SESSION['username'])) {
  echo "No user logged in. Please log in first.";
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Homepage</title>
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
            <span class="fs-4" href="dashboard.php">
                SeminarKuApp 
            </span>
          </a>
          <hr>
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="seminarsaya.php" class="nav-link link-dark">
                Seminar Saya
              </a>
            </li>
          </ul>
          <hr>
          <ul class="nav flex-column">
            <li>
              <a href="../Login.php" class="nav-link link-dark">
                Logout 
              </a>
            </li>
          </ul>
      </div>

      <!-- Content -->
      <div class="content">
        <h1>Welcome to SeminarKuApp  <?php echo $_SESSION["username"]; ?> !!</h1>
        <p>Terimakasih telah berkabung di platform SeminarKuApp, Raih wawasan menuju masa depan tak terkalahkan</p><br>
        <p> staf kami akan memasukkan anda kedalam jadwal Seminar</p><br>
        <p>cek secara berkala pada menu Seminar Saya.</p>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
