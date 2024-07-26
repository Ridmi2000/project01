<?php 
if (!session_id()) session_start(); 

// Check if the remember_me cookie is set
if (isset($_COOKIE["remember_email"])) {
    $remember_email = $_COOKIE["remember_email"];
    // Use $remember_email as needed (e.g., pre-fill the email input field)
}

if (isset($_COOKIE["remember"])) {
    $remember = $_COOKIE["remember"];
    // Use $remember as needed (e.g., set the checked attribute for the checkbox)
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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



<!--slide show-->

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height:400px; filter:blur(3px);" src="images/img5.jpg" class="d-block w-100" alt="Image 1">
      <div class="carousel-caption">
      <?php
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        echo "<h3>Hi " . $_SESSION['user_full_name'] .  "</h3>";
        
    } else {
        // If not logged in, show the default message and login/register button
        //echo "<h3>Welcome To UWU Sports Council</h3>";
        //echo "<p>One Of The Best Sports Council In Sri Lanka</p>";
        //echo '<a style="background-color:darkblue; border-color: darkblue;" href="index.php" class="btn btn-dark">Log In/Register</a>';
    }
?>

    
        <h3>Welcome To UWU Sports Council</h3>
        <p>One Of The Best Sports Council In Sri Lanka</p>
        <a style="background-color:darkblue; border-color: darkblue;" href="index.php" class="btn btn-dark">Log In/Register</a>
      </div>
    </div>
    <div class="carousel-item">
      <img style="height: 400px; filter:blur(3px);" src="images/img5.jpg" class="d-block w-100" alt="Image 2">
      <div class="carousel-caption">
        <h3>Welcome To UWU Sports Council</h3>
        <p>One Of The Best Sports Council In Sri Lanka</p>
        <a style="background-color:darkblue; border-color:darkblue;" href="#" class="btn btn-danger">Log In/Register</a>
      </div>
    </div>
    <div class="carousel-item">
      <img style="height: 400px; filter:blur(3px);" src="images/img5.jpg" class="d-block w-100" alt="Image 3">
      <div class="carousel-caption">
        <h3>Welcome To UWU Sports Council</h3>
        <p>One Of The Best Sports Council In Sri Lanka.</p>
        <a style="background-color:darkblue; border-color:darkblue" href="#" class="btn btn-danger">Log In/Register</a>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

<!--slide show end-->



<!-- about us -->
<div class="container my-4">
  <div class="row">
    <div class="col-md-6 image-content-container">
      <img style="width:500px; height: 300px;" src="images/img9.jpg" alt="Image 1">
    </div>
    <div class="col-md-6 image-content-container">
      <div class="content">
        <h3 style="color:darkblue; font-size:40px">We Are UWU Sports Coucil</h3>
        <p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        <a style="background-color:darkblue; border-color:darkblue;" href="#" class="btn btn-danger">more details</a>
      </div>
    </div>
  </div>
</div>

<!--vision and mission-->

<div class="container my-4">
  <div class="card">
    <div class="row no-gutters">
      <div class="col-md-6">
        <div class="card-body">
          <center><h3 style="color: darkblue; padding:10px;" class="card-title">Vision</h3></center>
          <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
       
        </div>
       
      </div>
      <div class="col-md-6">
         <center><img style=" height: 350px; padding: 50px;" src="images/sport4.webp" class="card-img" alt="Image 1"></center>
      </div>
    </div>
  </div>
</div>



<div class="container my-4">
  <div class="card">
    <div class="row no-gutters">
      <div class="col-md-6">
        <div class="card-body">
           <center><h3 style="color: darkblue; padding:10px;" class="card-title">Mission</h3></center>
          <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
         
        </div>
       
      </div>
      <div class="col-md-6">
         <center><img style=" height: 350px; padding: 50px;" src="images/sport3.jpeg" class="card-img" alt="Image 1"></center>
      </div>
    </div>
  </div>
</div>






  <!--sports-->


  <center><h1 style="padding:50px; font-size:40px; color: darkblue; font-weight:bolder;">UWU Sports Events</h1></center>

  <center>
  <div class="container">
    <div class="row">
      <!-- Square 1 -->
      <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/football.jpg" alt="Image 1">
        </div>
        <div class="text">
          <p>Football</p>
        </div>
      </div>



      <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/swimming.jpg" alt="Image 2">
        </div>
        <div class="text">
          <p>Swimming</p>
        </div>
      </div>

      <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/tenis.png" alt="Image 3">
        </div>
        <div class="text">
          <p>Tenis</p>
        </div>
      </div>

      <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/table_twnis.png" alt="Image 4">
        </div>
        <div class="text">
          <p>Table Tenis</p>
        </div>
      </div>

      <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/elle.png" alt="Image 5">
        </div>
        <div class="text">
          <p>Elle</p>
        </div>

      </div>



         <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/badmintain.png" alt="Image 5">
        </div>
        <div class="text">
          <p>Badmintain</p>
        </div>
      </div>

         <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/carrom.png" alt="Image 5">
        </div>
        <div class="text">
          <p>Carrom</p>
        </div>
      </div>


 <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/athletic.png" alt="Image 5">
        </div>
        <div class="text">
          <p>Athletics</p>
        </div>
      </div>


 <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/hockey.png" alt="Image 5">
        </div>
        <div class="text">
          <p>hockey</p>
        </div>
      </div>


 <div class="col-sm-2 square">
        <div class="image-container">
          <img class="img-fluid" style="width:150px; height:100px;" src="images/karate.png" alt="Image 5">
        </div>
        <div class="text">
          <p>Karate</p>
        </div>
      </div>






    </div>
  </div>

</center>
<!--sports end-->

<!--vedio start-->
      <center><h1 style="padding: 50px; font-weight: bolder; font-size: 40px; color: darkblue;">UWU Sports</h1></center>
      <video class="embed-responsive-item" controls>
     
        <source style="height:300px;" src="images/vedio.mp4" type="video/mp4">

      </video>
    </div>
  </div>


  <!--vedio end-->

  <!--facilities start-->




  <div class="container">

    <center><h1 style="color:darkblue; font-size:40px; padding:50px;">UWU Sports Council Facilities</h1></center>
    <div class="row">
      <!-- Card 1 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black;"  class="card">
          <center><img style="width:200px; height:100px;  padding: 20px;" src="images/service1.png" class="card-img-top" alt="Image 1"></center>
          <div class="card-body">
            <h5 class="card-title">Playground Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,.</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black"  class="card">
          <center><img style="width:200px; height:100px;  padding: 20px;" src="images/service2.png" class="card-img-top" alt="Image 2"></center>
          <div class="card-body">
            <h5 class="card-title">Indoor Stadium Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,.</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black"  class="card">
          <center><img style="width:200px; height:100px;  padding: 20px;" src="images/service3.png" class="card-img-top" alt="Image 3"></center>
          <div style="border-color: black"  class="card-body">
            <h5 class="card-title">Equipment Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black"  class="card">
          <center><img style="width:200px; height:100px;  padding: 20px;" src="images/service4.png" class="card-img-top" alt="Image 4"></center>
          <div style="border-color: black"  class="card-body">
            <h5 class="card-title">Gym Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,.</p>
          </div>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black"  class="card">
          <center><img style="width:200px; height:100px;  padding: 20px;" src="images/service5.png" class="card-img-top" alt="Image 5"></center>
          <div style="border-color: black"  class="card-body">
            <h5 class="card-title">Medical Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,.</p>
          </div>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-md-4 mb-4">
        <div style="border-color: black"  class="card">
          <center><img style="width:200px; height:100px; padding: 20px;" src="images/service6.png" class="card-img-top" alt="Image 6"></center>
          <div style="border-color: black"  class="card-body">
            <h5 class="card-title">Free Cauching Facilities</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!--facilities end-->


<!--cards start-->

 
   <div class="container mt-4 mb-4">

    <center><h4 style="font-size: 40px; color: darkblue; padding: 30px; font-weight: bolder;">UWU Sport Council Team</h4></center>
    <div class="row">
      <!-- Profile Card 1 -->
      <div class="col-md-4">
        <div class="card profile-card">
          <img src="images/face1.webp" alt="Profile 1" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title">Dilru Jayathilake</h5>
            <p style="font-weight: bolder;" class="card-text">Vice-Captain</p>
            <p class="card-text">Sport Council.<br>Uwa Wellassa University.<br>Badulla</p>
          </div>
        </div>
      </div>

      <!-- Profile Card 2 -->
      <div class="col-md-4">
        <div class="card profile-card">
          <img src="images/face4.jpg" alt="Profile 2" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title">Nimantha Rathnayake</h5>
            <p style="font-weight: bolder;" class="card-text">Prasident</p>
            <p class="card-text">Sport Council.<br>Uwa Wellassa University.<br>Badulla</p>
          </div>
        </div>
      </div>

      <!-- Profile Card 3 -->
      <div class="col-md-4">
        <div class="card profile-card">
          <img src="images/face3.jpg" alt="Profile 3" class="img-fluid">
          <div class="card-body">
            <h5 class="card-title">Madushan De Silva</h5>
            <p style="font-weight: bolder;" class="card-text">Tresurer</p>
            <p class="card-text">Sport Council.<br>Uwa Wellassa University.<br>Badulla</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--card end-->





<footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
  <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
