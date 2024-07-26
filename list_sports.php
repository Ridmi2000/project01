<?php
require_once 'sport1.php';

$sportObj = new sport1();
$sports = $sportObj->getAllSports();

if ($sports) {
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Sports</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">




  <style>
    /* Your existing styles here */


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
    
    /* Additional styles for modal */
    .modal-dialog {
      max-width: 80%;
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
      <!-- Content Area -->
  <div class="container mt-4">
        <h1>List of Sports</h1>
        <div class="row">
        <?php
            foreach ($sports as $sportItem) {
                echo "<div class='col-md-3 mb-4'>";
                echo "<div class='card'>";
                echo "<div class='card-body'>";
                
                echo "<h5 class='card-title'>" . $sportItem["name"] . "</h5>";
                echo "<p class='card-text'>Category: " . $sportItem["category"] . "</p>";
                echo "<p class='card-text'>Type: " . $sportItem["type"] . "</p>";

                // Use JavaScript to confirm deletion
                echo "<button class='btn btn-danger' onclick='confirmDelete(" . $sportItem['id'] . ")'>Delete</button>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
        </div>
    </div>

    <!-- JavaScript for confirmation -->
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this sport?")) {
                window.location.href = 'delete_sport.php?id=' + id;
            }
        }
    </script>
</body>
</html>
<?php
} else {
    echo "No sports found.";
}
?>