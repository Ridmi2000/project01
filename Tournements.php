
<?php
include_once "Class/Events.php";


//create object from event class
$eventsObj = new Events();

$events  = $eventsObj->displayData();

$event_table = $eventsObj->displayDataFortable();



if(isset($_POST['submit'])){
    $eventsObj->storeData($_POST);
  
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
 <script src="https://kit.fontawesome.com/f2ab1a3f38.js" crossorigin="anonymous"></script>
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

  #calendar-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh; /* Adjust the height as needed */
  }

  #clander {
    max-width: 80%; /* Set a maximum width for the calendar */
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




<div class="container my-4">
  <div class="row">
  <main class="col-md-10 col-12 ms-sm-auto">

    <div class="header">
        <h1>UWU Sports Events</h1>
     </div>

     <div id="clander"></div>

       
  </main>
  </div>
</div>










 






  <!--vedio end-->

  <!--facilities start-->






  <!--facilities end-->


<!--cards start-->

 


<!--card end-->





<footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
  <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
</footer>



<script>
   
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('clander');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
         events:<?php echo $events?>,
         allDay: false,
         displayEventTime: false,
    });
    calendar.render();
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
