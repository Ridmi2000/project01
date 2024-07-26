<?php

// Start a session
session_start();

require_once 'classes/DbConnector.php';
require_once 'classes/Attendance.php';

// Initialize variables for the selected date and sport
$selectedSport = null;
$selectedDate = null;
$studentData = [];

// Check for success message in the session
$successMessage = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : '';
unset($_SESSION['successMessage']); // Clear the success message

try {
    $db = \classes\DbConnector::getConnection();
    $attendance = new \classes\Attendance($db);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedSport = isset($_POST['sportType']) ? $_POST['sportType'] : null;
        $selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;

        if ($selectedSport && $selectedDate) {
            $studentData = $attendance->getAttendanceBySportType($selectedSport);
        }
    }
} catch (\PDOException $exc) {
    die("Error: " . $exc->getMessage());
}

// Include SweetAlert2 CSS and JS
echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.min.css">';
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.5/dist/sweetalert2.all.min.js"></script>';

// JavaScript function to display a single message box for success and submission confirmation
echo '<script>
    function showMessage(message, icon) {
        Swal.fire({
            title: message,
            icon: icon,
            showConfirmButton: false,
            timer: 1500, // Auto-close the message after 1.5 seconds
        });
    }

    function confirmAttendanceSubmission() {
        const presentRadios = document.querySelectorAll("input[name^=\'attendance\'][value=\'present\']:checked");
        const absentRadios = document.querySelectorAll("input[name^=\'attendance\'][value=\'absent\']:checked");
        
        if (presentRadios.length + absentRadios.length !== ' . count($studentData) . ') {
            Swal.fire("Error", "Please mark attendance for all students.", "error");
            return;
        }

        Swal.fire({
            title: "Submit Attendance",
            text: "Are you sure you want to submit attendance?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#007BFF",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, submit it!",
            cancelButtonText: "No, cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                showMessage("Attendance has been successfully submitted.", "success");
                setTimeout(function () {
                    document.forms["attendanceForm"].submit();
                }, 1500);
            }
        });
    }
</script>';
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
    /* Customize your styles here */

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

/*

   background-color: #0A0B4F;
   color: white;
   height: 100%;
   position: fixed;
   top: 0;
   left: 0;
   bottom: 0;
   width: 100%; /* Set to full width initially 
   max-width: 300px; /* Set a maximum width */
   /*overflow-y: auto;
   z-index: 1;*/
}

@media (min-width: 768px) {
   .sidebar {
      width: 300px; /* Set the width to 300px for larger screens */
   }
}



/* Updated styles for .container and .row to add padding */
.container-fluid {
  padding-left: 200px; /* Add padding to the left for the fixed sidebar */
}

.row {
  padding-top: 20px; /* Add padding to the top */
}

/* Updated styles for .content-box */
.content-box {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 10px;
  padding: 20px;
  margin: 10px;
  text-align: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  min-height: 100vh; /* Set a minimum height to ensure it fills the viewport */
  overflow-y: auto; /* Enable vertical scrolling for content */
}

/* Add a class to fix the width of the content area */
.fixed-content-width {
  width: calc(100% - 200px); /* Subtract the width of the fixed sidebar */
  margin-left: 200px; /* Set left margin to accommodate the fixed sidebar */
}



    .sidebar {
      background-color: #0A0B4F;
      color: white;
      height: 1000px;
      margin-right: 100px;
    }

    .sidebar a.nav-link {
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

    .content-box img {
      max-width: 100px;
      height: auto;
      margin-bottom: 10px;
    }

    .count {
      font-size: 24px;
      color: #0A0B4F;
    }

    .label {
      font-size: 18px;
      color: #555;
    }

    .table {
      font-size: 14px;
    }

    .table th, .table td {
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



   
        .table {
            border: none;
        }

        .table thead {
            background-color: #007BFF;
            color: #fff;
        }

        .form-check-label {
            display: inline;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e2e2e2;
        }

        .table td {
            border: 1px solid #ccc;
        }

  
.container-fluid {
    padding-left: 0; /* Remove padding */
}

.row {
    padding-top: 0; /* Remove padding */
}


 .fixed-content-width {
        width: calc(100% - 220px); /* Adjusted width to include a small margin */
        margin-left: 220px; /* Adjusted margin to create space from the side navigation bar */
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
      <!-- Content Area -->




   <div class="col-md-10 col-12 main-content">

    <div class="container mt-5">
        <h2 style="color:darkblue;">Student Details by Sport Type</h2>
        <form method="post">
            <div class="form-group">
                <label for="selectedDate">Select Date:</label>
                <input type="date" class="form-control" id="selectedDate" name="selectedDate">
            </div>
            <div class="form-group">
                <label for="sportType">Select Sport Type:</label>
                <select class="form-control" id="sportType" name="sportType">
                    <option value="">Select Sport Type</option>
                    <option value="football">Football</option>
                    <option value="basketball">Basketball</option>
                    <option value="volleyball">Volleyball</option>
                </select>
                <button style="background-color:darkblue;" type="submit" class="btn btn-primary mt-2">View Students</button>
            </div>
        </form>
        <?php if (!empty($studentData)): ?>
            <form method="post" action="process_attendance.php" name="attendanceForm">
                <input type="hidden" name="selectedSport" value="<?php echo $selectedSport; ?>">
                <input type="hidden" name="selectedDate" value="<?php echo $selectedDate; ?>">
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Enrollment Number</th>
                            <th>Name</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studentData as $student): ?>
                            <tr>
                                <td><?php echo $student['EnrollmentNumber']; ?></td>
                                <td><?php echo $student['FullName']; ?></td>
                               <td>
    <input type="hidden" name="studentNames[<?php echo $student['EnrollmentNumber']; ?>]" value="<?php echo $student['FullName']; ?>">
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance[<?php echo $student['EnrollmentNumber']; ?>]" value="present">
        <label class="form-check-label">Present</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="attendance[<?php echo $student['EnrollmentNumber']; ?>]" value="absent">
        <label class="form-check-label">Absent</label>
    </div>
</td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button style="background-color: darkblue;" type="button" class="btn btn-primary mt-2" onclick="confirmAttendanceSubmission();">Submit Attendance</button>
            </form>
        <?php endif; ?>
    </div>



      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
