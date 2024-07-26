<?php
require_once 'classes/DbConnector.php';
require_once 'classes/dashboard.php';

$totalRegistrations = classes\Dashboard::getTotalRegistrations();
$totalDonations = classes\Dashboard::getTotalDonations();
$totalFeedbacks = classes\Dashboard::getTotalFeedbacks();
$totalOrders = classes\Dashboard::getTotalOrders();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include your custom CSS if needed -->
  <style>
    /* Customize your styles here */
    
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
     /* Adjusted margin to accommodate the sidebar */
  }

    .sidebar .nav-link {
      color: white;
    }
    .content-box {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      margin: 10px 0;
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

 
 .content-box {
    /* Your existing styles for content boxes */
    margin: 10px 0; /* You can adjust this margin as needed */
  }




body {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}
  /* Adjust the main content area */
  .main-content {
    margin-left: 300px; /* Adjust the left margin to accommodate the fixed sidebar */
    /* Other styles for the main content */
    z-index: 2; /* Set a higher z-index for the content area */
    position: relative;
  }


/* CSS */
.container {
  display: flex;
  flex-direction: row;
}

.sidebar {
  flex: 0 0 250px; /* Set a specific width for the sidebar */
  background-color: #0A0B4F;
  color: white;
  /* Other styles for the sidebar */
}

.content {
  flex: 1; /* Let the content area take up the remaining space */
  padding: 20px;
  /* Other styles for the content area */
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

   <div class="col-md-9 col-14 main-content">

         <h1 style="padding: 20px; color: #0A0B4F;">Admin Dashboard</h1>
          <div class="row justify-content-center"> <!-- Center content horizontally -->
            <div class="col-md-6 text-center">
              <div class="content-box">
                <img style="width:300px; height: 100px;" src="images/dashboard1.png" alt="Registration">
                <div class="count"><?php echo $totalRegistrations; ?></div>
                <div class="label">Total Registrations</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="content-box">
                <img style="width:300px; height: 100px;" src="images/dashbord2.webp" alt="Orders Icon">
                <div class="count"><?php echo $totalOrders; ?></div>
                <div class="label">Total Orders</div>
              </div>
            </div>
          </div>

          <div class="row justify-content-center"> <!-- Center content horizontally -->
            <div class="col-md-6">
              <div class="content-box">
                <img style="width:300px; height: 100px;" src="images/dashboard3.jpg" alt="Students Icon">
                <div class="count"><?php echo $totalDonations; ?></div>
                <div class="label">Total Donations</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="content-box">
                <img style="width:300px; height: 100px;" src="images/dashboard4.jpg" alt="Feedback Icon">
                <div class="count"><?php echo $totalFeedbacks; ?></div>
                <div class="label">Total feedbacks</div>
              </div>
            </div>
          </div>
        <!-- Add more rows here -->

      </div>
    </div>
  </div>
  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
