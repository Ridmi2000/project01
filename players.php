
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to the admin login page if not logged in
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<style>







.navbar-nav .nav-link {
  color: white !important; /* Set the font color for navigation links */
}


.navbar-nav .nav-link:hover {
      background-color: white; /* Change this to your desired hover color */
      color: black !important; /* Change this to your desired hover text color */
    }




.navbar{
background-color:#0A0B4F;



}





.title {
  font-size: 60px;
  font-weight: bolder;
   color:darkblue;
}

@media (max-width: 768px) {
  .title {
    font-size: 30px;
    margin-top: 30px;
  }
}


</style>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <img style="width:150px; height:50px;" src="images/logo.jpg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="awards.php">Awards</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="./sports/Frontend/index.php">Sports</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Page/1.php">Time table</a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="players.php">Notices</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="Tournements.php">Calender</a>
      </li>
      
    

      <li class="nav-item">
        <a class="nav-link" href="letter.php">Letters</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sport_kit.php">Sports kits</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="donation.php">Donations</a>
      </li>
     
     
      
       <li class="nav-item">
        <a class="nav-link" href="feedback_page.php">Feedbacks</a>
      </li>
      
      <li class="nav-item">
      <a style="background-color:darkblue; border-color: darkblue; margin-right: 10px;" href="logout.php" class="btn btn-dark">Logout</a>
      </li>
     

    </ul>
  </div>
  <a class="nav-item" href="profile.php">
  <img class="rounded-profile" src="images/profile1.jpg" alt="Profile Icon" style="width:50px; height:50px;">
</a>

</nav>


    <div class="container-fluid">
    <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12">
                <div class="header">
                </div>

                <?php
                include("DbConnector.php");

                $sql = "SELECT id, sport, date, time, description FROM `user`";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    // Capitalize the first letter of the sport name
                    $capitalizedSport = ucfirst($row['sport']);
                ?>
                    <br>
                    <div class="col-sm-8 ">
                        <div style="margin-left: 400px;" class="card">
                            <div style="background-color:#D6EAF8;" class="card-body text-bg-light">
                                <h5 style="background-color:#2E86C1; text-align: center; color: white;" class="card-title text-bg-secondary">Notice</h5>
                                <ul class="">
                                    <li>Date: <?php echo $row['date']; ?></li>
                                    <li>Time: <?php echo date('g:i A', strtotime($row['time'])); ?></li>
                                    <li>Sport: <?php echo $capitalizedSport; ?></li>
                                    <br>
                                    <p class="card-text"><?php echo $row['description']; ?></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>
<footer style="background-color: #0A0B4F;" class="text-white text-center py-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
            </main>
        </div>
    </div>
</body>

</html>
