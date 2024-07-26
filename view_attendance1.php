<?php

require_once 'classes/DbConnector.php';
require_once 'classes/Attendance.php';

try {
    // Connect to the database
    $db = \classes\DbConnector::getConnection();
    
    // Get the selected sport type and date from the form
    $selectedSport = isset($_POST['sportType']) ? $_POST['sportType'] : null;
    $selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;
    $selectedStatus = isset($_POST['status']) ? $_POST['status'] : null;

    // Fetch student details from the database based on the selected sport and date
    $attendance = new \classes\Attendance($db);
    $studentData = $attendance->getAttendanceBySportTypeStatusAndDate($selectedSport, $selectedStatus, $selectedDate);
    $totalGirlsAttendance = $attendance->countGirlsAttendanceBySportTypeStatusAndDate($selectedSport, $selectedStatus, $selectedDate);
    $totalBoysAttendance = $attendance->countBoysAttendanceBySportTypeStatusAndDate($selectedSport, $selectedStatus, $selectedDate);

    // Count the total attendance
    $totalAttendance = count($studentData);
} catch (\PDOException $exc) {
    die("Error: " . $exc->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>

  <!-- Include your custom CSS if needed -->
  <style>

  body {
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

         .container-fluid {
            padding-right: 0; /* Remove padding on the right side */
        }

                .fixed-content-width {
            width: 100%; /* Set width to 100% */
            margin-left: 0; /* Remove left margin */
            margin-right: 0; /* Remove right margin */
        }

        .fixed-content-width {
    margin-left: 0;
}

        .container {
            margin-top: 20px;
            padding-right: 15px; /* Restore default padding */
        }

   
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
      height: 100%;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      width: 100%;
      max-width: 300px;
      overflow-y: auto;
      z-index: 1;
    }

    @media (min-width: 768px) {
      .sidebar {
        width: 300px;
      }
    }

    .container {
      margin-top: 20px;
    }

    .row {
      margin-right: 0;
    }

    .content-box {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      min-height: 100vh;
      overflow-y: auto;
    }

    .glass-container {
      margin-top: 5%;
      margin-bottom: 5%;
      background-color: rgba(255, 255, 255, 0.2);
      color: #333;
      text-align: center;
      padding: 20px;
      width: 100%;
      height: 200px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }


    .table-bordered thead th {
        background-color: darkblue;
        color: white; /* Set the text color to white */
    }

    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-bordered th, .table-bordered td {
      border: 1px solid #dee2e6;


    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
    }

    .table-striped tbody tr:nth-of-type(even) {
      background-color: #e2e2e2;
    }

    .table-hover tbody tr:hover {
      background-color: #d0d0d0;
    }


    .glass-container img {
      max-width: 200px;
      height: 120px;
    }

   
     .content-area {
    margin-left: 220px; /* Adjust this value according to the width of your sidebar */
    padding: 15px; /* Add padding to the left */
}

        .container-fluid {
            padding-right: 0; /* Remove padding on the right side */
        }

/* Add margin to the left of the content area */
.container {
    margin-top: 20px;
    margin-left: 320px; /* Adjust this value according to the width of your sidebar */
    padding-right: 15px; /* Restore default padding */
}

/* Add margin to the top of the content area when the screen is large enough */
@media (min-width: 768px) {
    .container {
        margin-top: 20px;
        margin-left: 300px; /* Adjust this value according to the width of your sidebar */
    }
}

/* Add margin to the top of the content area when the screen is extra large */
@media (min-width: 1200px) {
    .container {
        margin-top: 20px;
        margin-left: 300px; /* Adjust this value according to the width of your sidebar */
    }
}


.sidebar a.nav-link.active {
    color: white;
}
  </style>
</head>
<body>
  <div class="container-fluid fixed-content-width">
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

      <!-- Content Area -->
      <div class="container">
        <h2 style="color: darkblue;">View Attendance</h2>
        <form method="post" action="">
          <div class="form-group">
            <label for="sportType">Select Sport Type:</label>
            <select class="form-control" id="sportType" name="sportType">
              <option value="football">Football</option>
              <option value="basketball">Basketball</option>
              <option value="volleyball">Volleyball</option>
            </select>
          </div>
          <div class="form-group">
            <label for="sportType">Select Status:</label>
            <select class="form-control" id="status" name="status">
              <option value="present">Present</option>
              <option value="absent">Absent</option>
            </select>
          </div>
          <div class="form-group">
            <label for="selectedDate">Select Date:</label>
            <input type="date" class="form-control" id="selectedDate" name="selectedDate">
          </div>
          <button style="color:wheat; background-color: darkblue;" type="submit" class="btn btn-primary">View Attendance</button>
        </form>
        <div class="row">
          <!-- Column for Girls Attendance -->
          <div class="col-sm-6">
            <div class="glass-container">
              <img src="images/icon1.png" class="img-fluid" alt="Responsive image">
              <h5 style="color: darkblue; font-size: 40px;">Girls Attendance: <?php echo $totalGirlsAttendance; ?></h5>
            </div>
          </div>
          <!-- Column for Boys Attendance -->
          <div class="col-sm-6">
            <div class="glass-container">
              <img src="images/icon2.png" class="img-fluid" alt="Responsive image">
              <h5 style="color: darkblue; font-size: 40px;">Boys Attendance: <?php echo $totalBoysAttendance; ?></h5>
            </div>
          </div>
        </div>
        <!-- Glass Container for Total Attendance -->
        <div style="height: 100px;" class="glass-container">
          <h5 style="color:darkblue; font-size: 40px;">Total Attendance: <?php echo $totalAttendance; ?></h5>
        </div>
        <div class="mt-3" id="attendanceTable">
          <table class="table table-bordered table-striped table-hover">
            <thead style="background-color:red;">
              <tr>
                <th>Enrollment Number</th>
                <th>Name</th>
                <th>Degree</th>
              </tr>
            </thead>
            <tbody>
              <?php
                // Loop through the $studentData array and populate the table
                foreach ($studentData as $student) {
                  echo '<tr>';
                  echo '<td>' . $student['EnrollmentNumber'] . '</td>';
                  echo '<td>' . $student['FullName'] . '</td>';
                  echo '<td>' . $student['Degree'] . '</td>';
                  echo '</tr>';
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
