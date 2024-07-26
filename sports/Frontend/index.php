<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php"); // Redirect to the admin login page if not logged in
    exit();
}
?>


<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <link href="sport page nav bar.css" rel="stylesheet" type="text/css">
           <script src="https://kit.fontawesome.com/yourcode.js" ></script>
       
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


             <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           
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




</style>


    
    <body>
  <nav class="navbar navbar-expand-lg navbar-light">
  <img style="width:150px; height:50px;" src="../../images/logo.jpg">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../../home_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../../awards.php">Awards</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="../../sports/Frontend/index.php">Sports</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../../Page/1.php">Time table</a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="../../players.php">Notices</a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="../../Tournements.php">Calender</a>
      </li>
      
    

      <li class="nav-item">
        <a class="nav-link" href="../../letter.php">Letters</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="../../sport_kit.php">Sports kits</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../../donation.php">Donations</a>
      </li>
     
     
      
       <li class="nav-item">
        <a class="nav-link" href="../../feedback_page.php">Feedbacks</a>
      </li>
      
      <li class="nav-item">
      <a style="background-color:darkblue; border-color: darkblue; margin-right: 10px;" href="../../logout.php" class="btn btn-dark">Logout</a>
      </li>
     

    </ul>
  </div>
  <a class="nav-item" href="profile.php">
  <img class="rounded-profile" src="../../images/profile1.jpg" alt="Profile Icon" style="width:50px; height:50px;">
</a>

</nav>

        
        
        
        
        
          
        <div class ="searching">
            
            <form action="" class="search-bar" >
             <input type="text" placeholder="search here" name="q">
             <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <?php
include "DBConnector.php";

class Sport {
    public $id;
    public $name;
    public $image;
    public $category;
    public $type;
    function __construct($id, $name, $image, $category,$type) {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->category = $category;
        $this->type = $type;

    }
}

function getSportsFromDb() {
    $db = new DBConnector("localhost", "root", "your_password", "SportsDB");
    $conn = $db->connect();

    $sql = "SELECT * FROM sports";
    $result = $conn->query($sql);

    $sports = [];
    while($row = $result->fetch_assoc()) {
        $sport = new Sport($row["id"], $row["name"], $row["image_path"], $row["category"], $row["type"]);
        $sports[] = $sport;
    }
    $conn->close();

    return $sports;
}

$sports = getSportsFromDb();

?>

<div class="container">
    <center> <h1 style="padding-top: 20px;color:black;">INDOOR SPORTS </h1></center>
    <div class="cards-row">
    <?php
        foreach ($sports as $sport) {
            if ($sport->category == 'Indoor') {
         ?>
                <div style="border-color:black" class="card">
                    <h3 style="color: darkblue;"><?= $sport->name ?></h3>
                    <img src="../../<?= $sport->image ?>" alt="Sport <?= $sport->id ?>">
                    <div class="buttons">
                      <a class="men-button" style="text-decoration: none;" href="SportPage.php?SportId=<?= $sport->id ?>"><?= $sport->type ?></a>
                    </div>
                </div>
    <?php
            }
        }
    ?>
    </div>
</div>



<div class="container">
    <center> <h1 style="padding-top: 20px;color: black;">OUTDOOR SPORTS </h1></center>
    <div class="cards-row">
    <?php
        foreach ($sports as $sport) {
            if ($sport->category == 'Outdoor') {
    ?>
                <div style="border-color: black;" class="card">
                    <h3 style="color: darkblue;"><?= $sport->name ?></h3>

                    <!--
                    <img src="<?= $sport->image ?>" alt="Sport <?= $sport->id ?>">-->
                    <img src="../../<?= $sport->image ?>" alt="Sport <?= $sport->id ?>">
                    <div class="buttons">
                          <button style="text-decoration: none; padding: 10px; " class="men-button">Men</button>
                       <button style="text-decoration: none; padding: 10px; " class="women-button">Women</button>

                    </div>
                </div>
    <?php
            }
        }
    ?>
    </div>
</div>




<footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
  <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
</footer>

        
    </body>
</html>
