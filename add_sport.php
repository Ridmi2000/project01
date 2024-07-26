

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>New sport added successfully</p>
  </div>
</div>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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



  </style>


  
<script>
// Show the popup when the page loads if success parameter is set to 1
window.onload = function() {
  var success = <?php echo isset($_GET['success']) && $_GET['success'] == 1 ? 'true' : 'false'; ?>;
  if (success) {
    Swal.fire({
      icon: 'success',
      title: 'New sport added successfully',
      showConfirmButton: false,
      timer: 2000 // Close the popup after 2 seconds
    });
  }
}
</script>



</head>
<body>
  <div class="container-fluid">
    <div class="row">
      
       <!-- Sidebar -->
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

  <div class="mb-3">
  <h2 style="color:#0A0B4F; padding:15px;">Add Sports</h2>
  <form action="add.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="editKitName" class="form-label">Sports Name</label>
      <input type="text" class="form-control" id="editKitName" name="sportName" placeholder="Enter sport name">
    </div>
    <div class="mb-3">
      <label for="editKitCategory" class="form-label">Category</label>
      <select class="form-control" id="editKitCategory" name="sportCategory">
        <option>Indoor</option>
        <option>Outdoor</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="editKitType" class="form-label">Sport Type</label>
      <select class="form-control" id="editKitType" name="sportType">
        <option>Men</option>
        <option>Women</option>
        <option>Both</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="editKitImage" class="form-label">Upload Image</label>
      <input type="file" class="form-control" id="editKitImage" name="sportImage" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>


      </main>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
