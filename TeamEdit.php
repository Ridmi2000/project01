<?php

require_once 'Sport.php';
include_once "Class/Team.php";

$TeamObj = new Team();

$sportObj = new Sport();
$sports = $sportObj->getAllSports();

 if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $team = $TeamObj->displyaRecordById($editId);
    
  }
  // Update Record in teams  table
  if(isset($_POST['update'])) {
    $TeamObj->updateRecord($_POST);
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
            

            <!-- Add more navigation items here -->
          </ul>
        </div>
      </nav>

      <main class="col-md-10 col-12 ms-sm-auto">
      <div class="container mt-4">

        <div class="mb-3">
            <h2 style="color:#0A0B4F; padding:15px;">Update Team Member</h2>
            <form action="TeamEdit.php" method="POST" enctype="multipart/form-data">
             
                <div class="mb-3">
                    <label for="editKitCategory" class="form-label">Sport Name</label>
                    <select class="form-control" name="sport">
                    <?php
                        if ($sports->num_rows > 0) {
                            while ($row = $sports->fetch_assoc()) { 
                                $selected = ($row['id'] == $team['sport']) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $row['id'] ?>" <?php echo $selected ?>><?php echo $row['name']?></option>
                            <?php } 
                        } else {
                            echo "0 results";
                        }
                        $sportObj->closeDBConnection();
                        ?>
                    </select>    
                </div>

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="<?php echo $team['fullname'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" class="form-control" name="position" value="<?php echo $team['position'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $team['description'] ?>">
                </div>

                <div class="mb-3">
                    <img src="<?php echo $team['image_path']?>" style="width:100px">
                    <p>Uploaded Image</p>
                </div>

                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" class="form-control" name="profile_img" >
                </div>
                <input type="hidden" name="id" value="<?php echo $team['id']; ?>">
                <button type="submit" name="update" class="btn btn-primary" > Update</button>
                <a class="btn btn-danger" href="Teams.php">Cancel</a>
            </form>
            </div>


        </main>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
