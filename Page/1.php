<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php"); // Redirect to the admin login page if not logged in
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Time Table</title>
  <style>
    .glass-container {
      background: rgba(255, 255, 255, 0.7);
      border-radius: 15px;
      padding: 20px;
      margin: 10px;
      text-align: center;
      border: 2px solid rgba(255, 255, 255, 0.5);
      /* Transparent border */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Optional: Add a subtle box shadow */
      font-family: 'Arial', sans-serif;
      color:darkblue;
      font-size: 12px;
  
    }

    .glass-container img {
      width: 80px;
      
      height: 80px;
      border-radius: 15px;
      /* Adjust border radius for the image */
    }

    body {
      font-family: 'Arial', sans-serif; /* Change the font face */
    }

h1{ color:darkblue;
      font-size: 40px; 
    }

    h4{
      font-size: 16px; 
    }

    p{
      color:darkblue;
      font-size: 16px;

    }

    .lead {
      font-size: 20px; 
    }


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


  .rounded-profile {
    width: 50px;
    height: 50px;
    border-radius: 50%; /* Apply a circular border */
    object-fit: cover; /* Preserve the aspect ratio and cover the container */
  }





    /*slide show image code start*/

    .carousel-item img {
  filter: none;
}

.carousel-caption h3 {
    font-size: 58px;
  }

  /*slide show image code end*/

/*profile*/
    .image-content-container {
      display: flex;
      align-items: center;
    }

    .image-content-container img {
      max-width: 100%;
      height: auto;
    }

    .image-content-container .content {
      padding: 20px;
    }


    .profile-card {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }
    .profile-card img {
     /* width: 420px;*/

      height: 200px;
      object-fit: cover;
    }
    .profile-card .card-body {
      padding: 20px;
    }
    .profile-card .card-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .profile-card .card-text {
      font-size: 16px;
      color: #444;
    }

    /*profile ens*/

/*vedio start*/

    video {
      max-height: 400px; /* Set your desired height here */
      display: block;
      margin: 0 auto;
      background-color: black;
      margin-top: 50px;
      margin-bottom: 50px;
    }
/*vedio end*/


    .square {
      width: 240px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 200px;
      background-color: #0B065A;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      margin: 10px;
    }

    .square:hover {
      background-color:#040697;
    }

    .image-container {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }

   

    .text {
      font-size: 14px;
      text-align: center;
      color: white;
      margin-top: 10px;
    }


    
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
  <img style="width:150px; height:50px;" src="images/logo.jpg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../home_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../awards.php">Awards</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../sports/Frontend/index.php">Sports</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Page/1.php">Time table</a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="../players.php">Notices</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="../Tournements.php">Calender</a>
      </li>
      
    

      <li class="nav-item">
        <a class="nav-link" href="../letter.php">Letters</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../sport_kit.php">Sports kits</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../donation.php">Donations</a>
      </li>
     
     
      
       <li class="nav-item">
        <a class="nav-link" href="../feedback_page.php">Feedbacks</a>
      </li>
      
      <li class="nav-item">
      <a style="background-color:darkblue; border-color: darkblue; margin-right: 10px;" href="../logout.php" class="btn btn-dark">Logout</a>
      </li>
     

    </ul>
  </div>
  <a class="nav-item" href="profile.php">
  <img class="rounded-profile" src="images/profile1.jpg" alt="Profile Icon" style="width:50px; height:50px;">
</a>

</nav>


  <!-- New Section for Topic and Description -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center mt-5">
        <h1>Find Your Time Table From Sports</h1>
        <!--<p class="lead">Organize your activities efficiently with a well-planned timetable. 
          A timetable is a powerful tool that not only helps you manage your time effectively but also brings structure to your daily routine.
           By incorporating a well-thought-out schedule, you can ensure a harmonious balance between work, study, and leisure, fostering a sense of 
           control and productivity in your life. Stay organized and make the most out of your day, as a carefully crafted timetable provides a roadmap for success, 
           allowing you to allocate time wisely and achieve your goals. Embrace the discipline of time management, and you'll find yourself not only meeting deadlines
            but also enjoying a more fulfilling and well-rounded lifestyle.</p>
      </div>
    </div>
  </div>-->
<br><br>
  <!-- Containers Section -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Football/time_table.php">
            <img src="images/football.jfif" alt="Image 1">
          </a>
          <!-- Content for Container 1 -->
          <h4>Football</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Elle/time_table.php">
            <img src="images/elle.png" alt="Image 2">
          </a>
          <!-- Content for Container 2 -->
          <h4>Elle</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Badminton/time_table.php">
            <img  src="images/badminton.jfif" alt="Image 3">
          </a>
          <!-- Content for Container 3 -->
          <h4>Badminton</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Chess/time_table.php">
            <img src="images/chess.png" alt="Image 4">
          </a>
          <!-- Content for Container 4 -->
          <h4>Chess</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Volleyball/time_table.php">
            <img  src="images/volleyball.png" alt="Image 5">
          </a>
          <!-- Content for Container 5 -->
          <h4>Volleyball</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Cricket/time_table.php">
            <img src="images/cricket.jfif" alt="Image 1">
          </a>
          <!-- Content for Container 6 -->
          <h4>Cricket</h4>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Netball/time_table.php">
            <img src="images/netball.jfif" alt="Image 1">
          </a>
          <!-- Content for Container 1 -->
          <h4>Netball</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Baseball/time_table.php">
            <img src="images/baseball.png" alt="Image 2">
          </a>
          <!-- Content for Container 2 -->
          <h4>Baseball</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Karate/time_table.php">
            <img  src="images/karate.jfif" alt="Image 3">
          </a>
          <!-- Content for Container 3 -->
          <h4>Karate</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Basketball/time_table.php">
            <img src="images/basketball.png" alt="Image 4">
          </a>
          <!-- Content for Container 4 -->
          <h4>Basketball</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../Carrom/time_table.php">
            <img  src="images/carrom.jfif" alt="Image 5">
          </a>
          <!-- Content for Container 5 -->
          <h4>Carrom</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="glass-container">
          <a href="../road Race/time_table.php">
            <img src="images/road race.jfif" alt="Image 1">
          </a>
          <!-- Content for Container 6 -->
          <h4>Road Race</h4>
        </div>
      </div>
    </div>
  </div>
  

  <!-- Additional Containers and Bootstrap JS and Popper.js -->
  <!-- ... (rest of your HTML code) ... -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
