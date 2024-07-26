<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to the admin login page if not logged in
    exit();
}

require_once 'classes/DbConnector.php';
require_once 'classes/Feedback.php';
require_once 'classes/User.php';

use classes\Feedback;
use classes\DbConnector;
use classes\User;

$feedback = new Feedback();
$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $user_id = $_SESSION['user_id']; // Assuming you have a user ID in the session
    $db = DbConnector::getConnection();
    $user = User::getUserById($db, $user_id); // Retrieve user information by user ID

    if ($user) {
        $name = $user['full_name'];
        $subject = $_POST['subject'];
        $feedbackText = $_POST['feedback'];

        // Create a Feedback object and save the feedback
        $feedback->save($name, $subject, $feedbackText, $db);
    }
}

// Check if the user is authenticated and pre-fill the "Name" field
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $db = DbConnector::getConnection();
    $user = User::getUserById($db, $user_id);
}

// Fetch and display existing feedback
$db = DbConnector::getConnection();
$query = "SELECT * FROM feedback ORDER BY created_at DESC";
$stmt = $db->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for styling */







/* CSS */

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





.sidebar {
  flex: 0 0 250px; /* Set a specific width for the sidebar */
  background-color: #0A0B4F;
  color: white;
  /* Other styles for the sidebar */
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



        .feedback-container {
            margin: auto;
            max-width: 400px;
            border: 2px solid darkblue; /* Change border color here */
            padding: 20px;
            border-radius: 10px;
        }
        .comment-card {
            border: 2px solid #00008B; /* Change border color to dark blue */
            margin: 10px;
            border-radius: 10px;
            flex: 1;
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


<br><br>
      <div class="col-md-10 col-12 main-content">

<div class="container mt-5">
    <!-- Feedback Form -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="feedback-container">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <h1 style="color: darkblue;" class="mb-4 text-center">Feedback Form</h1>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($user['full_name']) ? htmlspecialchars($user['full_name']) : ''; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="feedback">Feedback:</label>
                        <textarea class="form-control" id="feedback" name="feedback" rows="4" required></textarea>
                    </div>
                    <button style="background-color: #0A0B4F;" type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Display Feedback using Bootstrap Cards -->
    <div class="row mt-5">
        <div class="col-md-12 d-flex">
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="comment-card flex-fill">
                    <div class="card-body">
                        <h5 class="card-title">Feedback from <?php echo $row['name']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Subject: <?php echo $row['subject']; ?></h6>
                        <p class="card-text"><?php echo $row['feedback']; ?></p>
                    </div>
                </div>
            <?php } ?>
       

