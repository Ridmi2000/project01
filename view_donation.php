<?php
require_once 'classes/Donation.php';
require_once 'classes/DbConnector.php';

// Get a database connection
$db = classes\DbConnector::getConnection();

// Get all donations
$donations = classes\Donation::getAllDonations($db);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Resignations</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: #0A0B4F;
            color: white;
            height: 1000px;
        }

        .sidebar .nav-link {
            color: white;
        }

        .resignation-table {
            margin-top: 20px;
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
      
         <div class="col-md-10 col-12 main-content">
            <div class="col-md-10 col-12">
                <div class="container mt-5">
                    <h2 style="color:darkblue;">View Donations</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact Number</th>
                                <th>NIC Number</th>
                                <th>Occupation</th>
                                <th>Donation Date</th>
                                <th>Donation Amount</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donations as $index => $donation): ?>
                                <tr>
                                    <th>
                                        <?php echo $index + 1; ?>
                                    </th>
                                    <td>
                                        <?= $donation['full_name'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['email'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['address'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['contact_number'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['nic_number'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['occupation'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['donation_date'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['donation_amount'] ?>
                                    </td>
                                    <td>
                                        <?= $donation['description'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and any other JS scripts if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>