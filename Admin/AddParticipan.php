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
    <link rel="stylesheet" href="../asset/style.css">
    <title>Manage Seminars</title>
  </head>
  <body>
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
              <a href="AddParticipan.php" class="nav-link active" aria-current="page">
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


      <div class="container mt-5">
        <h3>Manage Seminars</h3>
        <table class="table table-striped table-bordered mt-3">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Description</th>
              <th>Date</th>
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
                    echo "<td>
                            <button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#addParticipantModal" . $row['id'] . "'>Add Participant</button>
                            <a href='ViewParticipants.php?seminar_id=" . $row['id'] . "' class='btn btn-info btn-sm'>View Participants</a>
                          </td>";
                    echo "</tr>";
                    
                    // Modal for adding participants
                    echo "
                    <div class='modal fade' id='addParticipantModal" . $row['id'] . "' tabindex='-1' aria-labelledby='addParticipantLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='addParticipantLabel'>Add Participant to Seminar: " . $row['title'] . "</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <form action='../config/AddUserToSeminar.php' method='POST'>
                              <input type='hidden' name='seminar_id' value='" . $row['id'] . "'>
                              
                              <div class='mb-3'>
                                <label for='user' class='form-label'>Select User</label>
                                <select name='user_id' class='form-select' required>
                                  <option value=''>-- Select User --</option>";

                                  // Fetch users from the database
                                  $user_sql = "SELECT * FROM users";
                                  $user_result = $conn->query($user_sql);
                                  if ($user_result->num_rows > 0) {
                                      while ($user = $user_result->fetch_assoc()) {
                                          echo "<option value='" . $user['id'] . "'>" . $user['username'] . "</option>";
                                      }
                                  }
                                  
                                  echo "
                                </select>
                              </div>
                      
                              <button type='submit' class='btn btn-primary'>Add Participant</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No seminars found</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
