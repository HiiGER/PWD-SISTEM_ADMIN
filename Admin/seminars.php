<?php
session_start();
include('../config/conn.php'); // Include your database connection file

// Fetch seminars from the database
$sql = "SELECT * FROM seminars";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Seminars</title>
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
              <a href="seminars.php" class="nav-link active" aria-current="page">
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
      
      <div class="container mt-5">
        <h3>Manage Seminars</h3>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Tambah Seminar Baru
          </button>
        <table class="table table-striped table-bordered mt-3">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Date</th>
              <th>Capacity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['capacity'] . "</td>";
                    echo "<td>
                            <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateModal" . $row['id'] . "'>Update</button>
                            <a href='../config/DeleteSeminar.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                    
                    // Modal for updating seminar
                    echo "
                    <div class='modal fade' id='updateModal" . $row['id'] . "' tabindex='-1' aria-labelledby='updateModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='updateModalLabel'>Update Seminar</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <form action='../config/UpdateSeminar.php' method='POST'>
                              <input type='hidden' name='id' value='" . $row['id'] . "'>
                              <div class='mb-3'>
                                <label for='title' class='form-label'>Title</label>
                                <input type='text' class='form-control' name='title' value='" . $row['title'] . "' required>
                              </div>
                              <div class='mb-3'>
                                <label for='description' class='form-label'>Description</label>
                                <textarea class='form-control' name='description' rows='3' required>" . $row['description'] . "</textarea>
                              </div>
                              <div class='mb-3'>
                                <label for='date' class='form-label'>Date</label>
                                <input type='date' class='form-control' name='date' value='" . $row['date'] . "' required>
                              </div>
                              <div class='mb-3'>
                                <label for='capacity' class='form-label'>Capacity</label>
                                <input type='number' class='form-control' name='capacity' value='" . $row['capacity'] . "' required>
                              </div>
                              <button type='submit' class='btn btn-primary'>Update Seminar</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No seminars found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    
    </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>

    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Seminar</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="../config/AddSeminar.php" method="POST" class="needs-validation" novalidate>
              
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" id="title" name="title" required>
                  <div class="invalid-feedback">
                      Please enter a seminar title.
                  </div>
              </div>

              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                  <div class="invalid-feedback">
                      Please enter a seminar description.
                  </div>
              </div>

              <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" class="form-control" id="date" name="date" required>
                  <div class="invalid-feedback">
                      Please select a seminar date.
                  </div>
              </div>

              <div class="mb-3">
                  <label for="capacity" class="form-label">Capacity</label>
                  <input type="number" class="form-control" id="capacity" name="capacity" required>
                  <div class="invalid-feedback">
                      Please enter the seminar capacity.
                  </div>
              </div>

              <button type="submit" class="btn btn-primary">Add Seminar</button>
          </form>
        </div>


      </div>
    </div>
  </div>

</html>



