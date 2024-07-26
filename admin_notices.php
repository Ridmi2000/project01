<?php
include("DbConnector.php");

// Define variables to store submitted data
$sport = $role = $date = $time = $description = '';
$msg = '';

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Collect and sanitize user input
    $sport = mysqli_real_escape_string($con, $_POST['sport']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Check if the date is a future date
    $currentDate = date('Y-m-d');
    if ($date < $currentDate) {
        $msg = '<div class="alert alert-danger" role="alert">
            Please enter a future date!
        </div>';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO user(sport,role,date,time,description) VALUES('$sport','$role','$date','$time','$description')";
        $result = mysqli_query($con, $sql);
        if ($result === true) {
            $msg = '<div class="alert alert-success" role="alert" id="success-alert">
            The data insertion process has been successfully completed.!!
            </div>';
        }
    }
}

// Display the form and the review table
?>


// Display the form and the review table
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
    <title>Sport Council Meetings</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    

   
</head>

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

         
  

body {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}
  /* Adjust the main content area */
  .main-content {
    margin-left: 300px; /* Adjust the left margin to accommodate the fixed sidebar */
    /* Other styles for the main content */
    z-index: 2; /* Set a higher z-index for the content area */
    position: relative; /* Ensure proper stacking context */
  }
</style>


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

            <div class="header">
                <h1>Sports Council Notices</h1>
            </div>
            
            <div class="main">
            <?php echo $msg; ?>
                <!-- Notice Form -->
                <div class="meeting-form">
                    <h2 style="color: #0A0B4F;">Notices</h2>
                    <form id="noticeForm" method="POST" action="">
                        <div>
                            <label for="sport">Sport:</label>
                           <select id="sport" name="sport" required>
                                 <option value="sport">Select Sport</option>
                                <option value="athletic">Athletic</option>
                                <option value="badminton">Badminton</option></option>
                                <option value="baseball">Baseball</option>
                                 <option value="basketball">Basketball</option>
                                 <option value="cricket">Cricket</option>
                                 <option value="chess">Chess</option>
                                 <option value="carrom">Carrom</option>
                                 <option value="Elle">Elle</option>
                                 <option value="hokey">Hokey</option>
                                 <option value="football">Football</option>
                                 <option value="karate">Karate</option>
                                 <option value="swimming">Swimming</option>
                                 <option value="netball">Netball</option>
                                 <option value="tabletennis">Table Tennis</option>
                                 <option value="roadrace">Road Race</option>
                                 <option value="taekwondo">Taekwondo</option>
                                 <option value="tennis">Tennis</option>
                                 <option value="rugby">Rugby</option>
                                 <option value="volleyball">Volleyball</option>
                                 <option value="weightlifting">Weightlifting</option>
                                 <option value="all">All</option>
                           </select> 
                        </div>
                        <div>
                            <label for="meetingfor">Role:</label>
                            <select id="role" name="role"required>
                           <option value="role">Select Role</option>
                           <option value="players">Players</option>
                           <option value="all">All</option>
    </select>
                        </div>
                        <div>
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div>
                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time"required>
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                        </div>
                        <div>
                           <button type="submit" name="submit">Submit</button>
                            <button type="button" id="submit-notice-button" style="display: none;">Submit Notice</button> !-->
                            
                        </div>
                    </form>
                </div>

                <!-- Notices Table -->
               <!-- Notices Table -->
<div class="meeting-table" id="notice_table">
    <h2 style="color: #0A0B4F;">Recent Notices</h2>
    <table>
        <thead>
            <tr>
                <th>Sport</th>
                <th>Role</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $id = "";
                $query = "SELECT * FROM user ORDER BY id";
                $tbl = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($tbl)) {
                    // Capitalize the first letter of the sport name
                    $capitalizedSport = ucfirst($row['sport']);

                    // Capitalize the first letter of the role
                    $capitalizedRole = ucfirst($row['role']);
            ?>
            <tr>
                <td><?php echo $capitalizedSport; ?></td>
                <td><?php echo $capitalizedRole; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-sm">Edit</a><br>
                    <button class="delete btn btn-danger btn-sm" id="del_<?php echo $row["id"]; ?>" data-id="<?php echo $row["id"]; ?>">Delete</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

            </div>
           
            <footer>
                <p>&copy; 2023 Sport Council</p>
            </footer>
        </div>
    </div>

   
<script>
  $(document).ready(function () {
    
    //dlete
    $(document).on('click','.delete',function(e){ 
       e.preventDefault();
      var el = this;
      var deleteid = $(this).data('id');

      swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
        type: "post",
        url: "delete.php",
        data: {id:deleteid},
        
        success: function (response) {
          console.log(response);
          if(response == 1){

          swal(" Success!", "Notice deleted Successfully!", "success");
           $("#notice_table").load(location.href + " #notice_table");
          }
            
         
        }
      });


  } else {
    swal("Your imaginary file is safe!");
  }
});
      


      
    });
  });
</script>







</body>

</html>

