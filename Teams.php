<?php
include_once "Class/Team.php";
 
$teamObj = new Team();


if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $teamObj->deleteRecord($deleteId);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
      height: 100vh;
    }

    .sidebar .nav-link {
      color: white;
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
    
    .modal-dialog {
      max-width: 80%;
    }


    .flex-container { 
        display: flex; 
        flex-flow: column wrap; 
        align-content: flex-end; 
    } 
        
    .flex-container > div { 
        margin: 10px; 
        text-align: center; 
    } 
 
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
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
        <h3>Team List</h3>
        <hr>
        <div class="flex-container"> 
            <div>
                <a class="btn btn-primary" href="TeamAdd.php">Create a Team</a>
            </div>
        </div>
        <div class="mb-3">
            <table class="table">
                <thead>
                    <tr>
                    <th>Sport</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                     $teams  = $teamObj->displayData();
                     if (is_array($teams)) {
                      foreach ($teams as $data) {
                          // Your loop logic here
                          echo "<tr>";
                          echo "<td>". $data['name']. "</td>";
                          echo "<td>". $data['fullname']. "</td>";
                          echo "<td>". $data['position']. "</td>";
                          echo "<td>". $data['description']. "</td>";
                          echo "<td>" . "<img src='" . $data['image_path'] . "' alt='Team Image' style='max-width: 100px; max-height: 100px;' />" . "</td>";
                          echo "<td>
                          <a href='TeamEdit.php?editId=". $data['team_id']. "' style='color:green'>Edit</a>
                          <a href='Teams.php?deleteId=". $data['team_id']. "' style='color:red' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                          </td>";
                          echo "</tr>";
                      }
                    }
                  ?>
                </tbody>
            </table>
        </main>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
