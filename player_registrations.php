<?php

use classes\DbConnector;
use classes\User;

require_once 'classes/DbConnector.php';
require_once 'classes/User.php';

$con = DbConnector::getConnection();



// Retrieve a list of all admins
$users = User::getAllPlayers($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Include Bootstrap and CSS styles -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user registrations</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include your custom CSS if needed -->

  <style>

     .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: #0A0B4F;
    color: white;
    overflow-y: auto;
    height: 100%;
    width: 250px; /* Adjust the width if needed */
    z-index: 1;
    padding: 20px; /* Add padding to the sidebar */
    margin: 0; /* Reset margin */
  }

  .main-content {
    padding: 20px;
    z-index: 2;
    position: relative;
    margin-left: 250px; /* Adjust margin to fit the sidebar */
  }

    .sidebar .nav-link {
      color: white;
    }
    .content-box {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      background-color: #0A0B4F;
      color: white;
      min-height: 100vh;
    }

    .sidebar .nav-link {
      color: white;
    }

    .table {
      font-size: 14px;
    }

    .table th,
    .table td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }


    .table th {
      background-color: #0A0B4F;
      color: white;
    }


    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
 <div class="container-fluid">
    <div class="row">
      <!-- Vertical Navigation Bar -->
     <nav class="col-md-2 col-12 sidebar p-0">
             <div class="position-sticky">
          <h4 class="my-3 text-center">Dashboard</h4>
          <ul class="nav flex-column">

          
            <a href="logout.php" class="btn btn-outline-light btn-primary btn-light" style="color: black;">Logout</a>

<br>

                      <li class="nav-item">
                      <a class="nav-link active" href="admin_dashboard.php">Home</a>
                    </li>

            
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_registrations.php">admin registrations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="player_registrations.php">player registrations</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" href="admin_absence_letters.php">absence letters</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="add_resignation.php">add resignations</a>
                        </li>

                       

                        <li class="nav-item">
                            <a class="nav-link active" href="view_donation.php">view donations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="admin_notices.php">notices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="admin_event.php">Calender</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="admin_sport_kit.php">sports kits</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="mark_attendence.php">mark attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="view_attendance1.php">view attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="2.php">time table</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="./add_sport.php">Add Sport</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="./list_sports.php">Sport List</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="./Teams.php">Teams Management</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="./EquipmentStock.php">Equipment Management</a>
                        </li>

           

            <li class="nav-item">
              <a class="nav-link active" href="admin_feedback.php">feedback</a>
            </li>

            <li class="nav-item">
                            <a class="nav-link active" href="admin_profile.php">profile</a>
                        </li>
            

            <!-- Add more navigation items here -->
          </ul>
        </div>
      </nav>
      <main class="col-md-10 col-12 ms-sm-auto">
        <div class="container mt-4">
          <h2 style="color:#0A0B4F;">Admin Information</h2>

          <!-- Display list of admins -->
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Full Name</th>
                  <th>University Email</th>
                  <th>Phone Number</th>
                  <th>Sport Type</th>
                  <th>Degree</th>
                  <th>Enrollment Number</th>
                  <th>Gender</th>
                  <th>Medical Issues</th>

                </tr>
              </thead>
              <tbody>
                <?php foreach ($users as $user) { ?>
                  <tr>
                    <td>
                      <?php echo $user['full_name']; ?>
                    </td>
                    <td>
                      <?php echo $user['university_email']; ?>
                    </td>
                    <td>
                      <?php echo $user['phone_no']; ?>
                    </td>
                    <td>
                      <?php echo $user['sport_type']; ?>
                    </td>
                    <td>
                      <?php echo $user['degree']; ?>
                    </td>
                    <td>
                      <?php echo $user['enrollment_no']; ?>
                    </td>
                    <td>
                      <?php echo $user['gender']; ?>
                    </td>
                    <td>
                      <?php echo $user['medical_issues']; ?>
                    </td>
                    
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>



          <!-- Admin Addition Modal -->

        </div>
    </div>
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>