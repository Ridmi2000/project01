<?php 

include_once('../../Class/Team.php');
 
 $teamObj = new Team();
 $sport_id = $_GET['SportId'];
 $teams = $teamObj->displayDataSportPage($sport_id);

 $sports = $teamObj->showSport($sport_id);

?>

<html>
    <head>
        <title>Sport</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="sport.css" rel="stylesheet" type="text/css">
           <script src="https://kit.fontawesome.com/yourcode.js" ></script>
        <script src="slideshow.js"></script>
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
         
    </head>
     
    <body>
        
        <nav class="navbar" >
            <div class="navdiv">
                <div class ="logo"> 
                    <img src="splogo.jpg" >
             </div>
                <ul>
                    <li> <a href ="../../Registrations/" >  HOME   </a></li>
                    <li> <a href ="#" >  SPORT    </a></li>
                    <li> <a href ="#" >  EQUIPMENT</a></li>
                    <li> <a href ="#" >  ABSENCE   </a></li>
                    <li> <a href ="#" >  SPORT KITS  </a> </li> 
                    <li> <a href ="#" >  FEEDBACK     </a></li>
                    <li> <a href ="#" >  RESIGNATION  </a> </li>
   
               </ul>
            
       <div class="corner-links">
          <a href="#" class="signup-link">Sign Up</a>
          <a href="#" class="profile-link">Profile</a>
       </div>
                
                <div  class="logo2">
                      <img src="logo_1.jpg"> </div>
                 
              </div> 
            </nav>
      

        
        
        <div class="container">
            
            <div class="grid">
            <div class="item item-1">
               
            <?php 
            if (is_array($sports)) {
                  foreach ($sports as $data) {
                     echo "<h1 style='padding:10px;'>". $data['name']."</h1></div>";
                  }
              }
            ?>
                
                <div class="item item-2">
      <p style="">Weightlifting is a popular and challenging sport that involves lifting heavy weights in a controlled manner to build strength, power, 
          and muscular endurance. It is not only a competitive sport but also a widely practiced form of exercise among fitness enthusiasts. 
          The primary goal of weightlifting is to increase the maximum weight that can be lifted in two main lifts: the snatch and the clean and jerk.</p>
                
            </div>
           
 
    
    <div class="item item-3">
      <img src="dumble.jpg" alt="Dumbbell">
    </div>
  

 
    <div class="item item-4">
        <div class="card">
          <h2>Captain</h2>
          <?php 
          if (is_array($teams)) {
                foreach ($teams as $data) {
                    if ($data['position'] === 'Captain') {
                        // Display information only for the captain
                        echo "<p>Full Name: " . $data['fullname'] . "</p>";
                        echo "<p>Position: " . $data['position'] . "</p>";
                        echo "<img src='../../Registrations/" . $data['image_path'] . "' alt='Team Image' style='max-width: 100px; max-height: 100px;' />";
                        // Add other captain-related information as needed
                    }
                }
            }
            ?>
      </div>
    </div>

    <div class="item item-5">
      <div class="card">
          <h2>Vice Captain</h2>
          <?php 
          if (is_array($teams)) {
                foreach ($teams as $data) {
                    if ($data['position'] === 'Vice Captain' || $data['position'] === 'vice captain') {
                        // Display information only for the captain
                        echo "<p>Full Name: " . $data['fullname'] . "</p>";
                        echo "<img src='../../Registrations/" . $data['image_path'] . "' alt='Team Image' style='max-width: 100px; max-height: 100px;' />";
                        // Add other captain-related information as needed
                    }
                }
            }
            ?>
      </div>
    </div>
</div>
    

            
            
<div class="Team">
    <center>
        <?php 
            if (is_array($sports)) {
                  foreach ($sports as $data) {
                     echo "<h1 style='padding:30px;'>". $data['name']. " Team</h1></div>";
                  }
              }
          ?>
     
    </center>
    <div class="cards-row">
        <?php 
          if (is_array($teams)) {
                foreach ($teams as $data) {
                    if ($data['position'] != 'captain' && $data['position'] != 'vice captain') {
                        // Display information only for the captain
                        echo "<div class='card-1'>";
                        echo " <h3 style='color: #e5b535;'>".$data['position']."</h3>";
                        echo "<img src='../../Registrations/" . $data['image_path'] . "' alt='Team Image' style='max-width: 100px; max-height: 100px;' />";
                        echo "<p style='color:white'>" . $data['fullname'] . "</p>";
                        echo "</div>";
                      
                      
                        // Add other captain-related information as needed
                    }
                }
            }
        ?>     
        <!-- Add more card elements as needed -->
    </div>

    <center>
        <h1 style="color: #e5b535;">Awards</h1>
    </center>
    <div class="slideshow-container">
        <div class="slide fade">
            <img src="whitel.jpg" alt="Slide 1">
            <div class="caption">Caption for Slide 1</div>
        </div>
        <div class="slide fade">
            <img src="slide2.jpg" alt="Slide 2">
            <div class="caption">Caption for Slide 2</div>
        </div>
        <div class="slide fade">
            <img src="slide3.jpg" alt="Slide 3">
            <div class="caption">Caption for Slide 3</div>
        </div>
    </div>
</div>

</div>
        </div>
   </body>
</html>
