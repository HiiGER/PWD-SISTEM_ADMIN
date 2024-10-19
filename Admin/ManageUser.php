<?php
session_start();
include('../config/conn.php'); // Include your database connection file

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Users</title>
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
              <a href="ManageUser.php" class="nav-link active" aria-current="page">
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
      
      <div class="container mt-5">
        <h3>Manage Users</h3>

        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Tambahkan peserta baru
        </button>

        <table class="table table-striped table-bordered mt-3">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>
                            <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#updateModal" . $row['id'] . "'>Update</button>
                            <a href='../config/DeleteUser.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                    
                    // Modal for updating user
                    echo "
                    <div class='modal fade' id='updateModal" . $row['id'] . "' tabindex='-1' aria-labelledby='updateModalLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title' id='updateModalLabel'>Update User</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                            <form action='../config/UpdateUser.php' method='POST'>
                              <input type='hidden' name='id' value='" . $row['id'] . "'>
                              <div class='mb-3'>
                                <label for='name' class='form-label'>Name</label>
                                <input type='text' class='form-control' name='name' value='" . $row['username'] . "' required>
                              </div>
                              <div class='mb-3'>
                                <label for='email' class='form-label'>Email</label>
                                <input type='email' class='form-control' name='email' value='" . $row['email'] . "' required>
                              </div>
                              <div class='mb-3'>
                                <label for='role' class='form-label'>Role</label>
                                <select class='form-control' name='role' required>
                                  <option value='user' " . ($row['role'] == 'user' ? 'selected' : '') . ">User</option>
                                  <option value='admin' " . ($row['role'] == 'admin' ? 'selected' : '') . ">Admin</option>
                                </select>
                              </div>
                              <button type='submit' class='btn btn-primary'>Update User</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>";
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
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
                  <form action="../config/Func_regis.php" method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter a username.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter a password.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <div class="invalid-feedback">
                            Please confirm your password.
                        </div>
                    </div>

                    <input type="hidden" name="role" value="user">
                    <input type="hidden" name="act" value="add">

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                  </form>
        </div>

      </div>
    </div>
  </div>

</html>



