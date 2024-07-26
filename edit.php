<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sport Council Meetings</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Vertical Navigation Bar -->
            <nav class="col-md-2 col-12 sidebar">
                <div class="position-sticky">
                    <h4 class="my-3 text-center">Dashboard</h4>
                    <ul class="nav flex-column">
                         <button style="color:black;" class="btn btn-outline-light btn-primary btn-light">Logout</button><br>

              <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard.php">Home</a>
            </li>

            
            <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard_registration_details.php">registration</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard_sports_kit.php">Sports kits</a>
            </li>


            <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard_letters.php">letters</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="admin_notice.php">Notices</a>
            </li>

             <li class="nav-item">
              <a class="nav-link active" href="admin_meeting.php">meetings</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard_tournament.php">Tournaments</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard_feedback.php">feedback</a>
            </li>

            <!-- Add more navigation items here -->
          </ul>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 col-12 ms-sm-auto">

            <div class="header">
                <h1>Sport Council Meetings</h1>
            </div>
            








            <div class="main">
            
                <!-- Notice Form -->
                <div class="meeting-form">
                    <h2 style="color: #0A0B4F;">Update</h2>
                    <?php 

include("DbConnector.php");

$id = $_GET['id'];
$options = "";
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
    $sport = $_POST['sport'];
    $role = $_POST['role'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    // Check if the date is a future date
    $currentDate = date('Y-m-d');
    if ($date < $currentDate) {
        echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Invalid Date",
                    text: "Please enter a future date!",
                });
              </script>';
    } else {
        $query = "UPDATE user SET sport='$sport',role='$role',date='$date',time='$time',description='$description' WHERE id ='$id'";
        if (mysqli_query($con, $query)) {
            echo '<script>
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Data Successfully Updated",
                        showConfirmButton: false,
                        timer: 2500
                    });
                  </script>';
        }
    }
}
?>
                    <form id="noticeForm" method="POST" action="">
                        <div>
                            <label for="sport">Sport:</label>
                           <select id="sport" name="sport" value="" required>
                             
                                <option value=""><?php echo $row['sport'];?></option>
                                <option value="athletic">Athletic</option>
                                <option value="badminton">Badminton</option></option>
                                <option value="baseball">Baseball</option>
                                 <option value="basketball">Basketball</option>
                                 <option value="cricket">Cricket</option>
                                 <option value="chess">Chess</option>
                                 <option value="carrom">Carrom</option>
                                 <option value="elle">Elle</option>
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
                            <select id="role" name="role" value=" " required>
                           <option value=""><?php echo $row['role']; ?></option>
                           <option value="players">Players</option>
                           <option value="all">All</option>
    </select>
                        </div>
                        <div>
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" value="<?php  echo $row['date']; ?>  " required>
                        </div>
                        <div>
                            <label for="time">Time:</label>
                            <input type="time" id="time" name="time" value="<?php echo $row['time']; ?>"   required>
                        </div>
                        <div>
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4"  cols="50" value="" ><?php echo $row['description']; ?></textarea>

                            
 
                        </div>
                        <div>
                        
                           <button name="update" type="submit">Update</button>
                           <a href="admin_notices.php" class="btn btn-warning btn-md">Show Data</a>
                          
                            
                        </div>
                    </form>
                </div>

               
            </div>
            <footer>
                <p>&copy; 2023 Sports Council</p>
            </footer>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


 
      


    
</html>