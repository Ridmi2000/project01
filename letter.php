<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to the admin login page if not logged in
    exit();
}


require_once 'classes/DbConnector.php';
require_once 'classes/Absence.php';
require_once 'classes/User.php';

use classes\Absence;
use classes\DbConnector;
use classes\User;

$absence = new Absence();
$user = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle form submission
  $user_id = $_SESSION['user_id']; // Assuming you have a user ID in the session
  $db = DbConnector::getConnection();
  $user = User::getUserById($db, $user_id); // Retrieve user information by user ID

  if ($user) {
    $name = $user['full_name'];
    $address = $user['address'];
    $enrollmentNumber = $user['enrollment_no'];
    $contactNumber = $user['phone_no'];
    $sportType = $_POST['sportType'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $numberOfDates = $_POST['numberOfDates'];
    $reasonForAbsence = $_POST['reasonForAbsence'];


    // Create a Feedback object and save the feedback
    $absence->saveAbsenceRecord($name, $address, $enrollmentNumber, $contactNumber, $sportType, $dateFrom, $dateTo, $numberOfDates, $reasonForAbsence, $db);

      if ($absence->saveAbsenceRecord($name, $address, $enrollmentNumber, $contactNumber, $sportType, $dateFrom, $dateTo, $numberOfDates, $reasonForAbsence, $db)) {
      // Set a success message if the record is saved successfully
      $successMessage = 'Absence record saved successfully!';
    }
  }
}

// Check if the user is authenticated and pre-fill the "Name" field
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $db = DbConnector::getConnection();
  $user = User::getUserById($db, $user_id);
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
    color: white !important;
    /* Set the font color for navigation links */
  }


  .navbar-nav .nav-link:hover {
    background-color: white;
    /* Change this to your desired hover color */
    color: black !important;
    /* Change this to your desired hover text color */
  }




  .navbar {
    background-color: #0A0B4F;



  }


  .form-container {
    margin: auto;
            max-width: 550px;
            border: 2px solid darkblue; /* Change border color here */
            padding: 20px;
            border-radius: 10px;

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


<br><br>




  <div id="absenceForm" class="form-container">
    <h3 style="color:darkblue;" class="mb-3">Absence Letter Form</h3>
    <div class="container mt-5">
      <div class="absence-form">
        
          <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" onsubmit="return confirmSubmission()">

            <?php if (!empty($successMessage)) : ?>
  <div style="background-color:lightblue;" class="alert alert-success mt-3" role="alert">
    <?php echo $successMessage; ?>
  </div>
<?php endif; ?>
          
          <!-- Your form fields here -->
          <div class="form-group">
            <label for="fullName">Full Name:</label>
            <input type="text" class="form-control" name="fullName" id="fullName"
              value="<?php echo isset($user['full_name']) ? htmlspecialchars($user['full_name']) : ''; ?>" readonly>
          </div>

          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" id="address"
              value="<?php echo isset($user['address']) ? htmlspecialchars($user['address']) : ''; ?>" readonly>
          </div>

          <div class="form-group">
            <label for="enrollmentNumber">Enrollment Number:</label>
            <input type="text" class="form-control" name="enrollmentNumber" id="enrollmentNumber"
              value="<?php echo isset($user['enrollment_no']) ? htmlspecialchars($user['enrollment_no']) : ''; ?>"
              readonly>
          </div>

          <div class="form-group">
            <label for="contactNumber">Contact Number:</label>
            <input type="text" class="form-control" name="contactNumber" id="contactNumber"
              value="<?php echo isset($user['phone_no']) ? htmlspecialchars($user['phone_no']) : ''; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="sportType">Sport Type:</label>
            <select class="form-control" name="sportType" id="sportType" required>
              <option value="">Select Sport Type</option>
              <option value="football">Football</option>
              <option value="basketball">Basketball</option>
              <option value="tennis">Tennis</option>
              <option value="basketball">Netball</option>
              <option value="basketball">Cricket</option>
              <option value="basketball">Chess</option>
              <option value="basketball">Carom</option>
              <!-- Add more options if needed -->
            </select>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="dateFrom">Date from:</label>
              <input type="date" class="form-control" name="dateFrom" id="dateFrom" required>
            </div>
            <div class="form-group col">
              <label for="dateTo">Date to:</label>
              <input type="date" class="form-control" name="dateTo" id="dateTo" required>
            </div>
            <div class="form-group col">
              <label for="numberOfDates">Number of Dates:</label>
              <input type="text" class="form-control" name="numberOfDates" id="numberOfDates" required>
            </div>
          </div>
          <div class="form-group">
            <label for="reasonForAbsence">Reason for Absence:</label>
            <textarea class="form-control" id="reasonForAbsence" name="reasonForAbsence" rows="3" required></textarea>
          </div><br>
          <button style="background-color:darkblue;" type="submit" class="btn btn-primary">Submit</button>



        </form>
      </div>
    </div>
  </div>

  <!-- Resignation Letter Form 
    <div id="resignationForm" class="form-container">
      <h3 style="color:darkblue;" class="mb-3">Resignation Letter Form</h3>
      <form>
        <div class="form-group">
          <label for="fullName">Full Name:</label>
          <input type="text" class="form-control" id="fullName" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" id="address" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone No:</label>
          <input type="tel" class="form-control" id="phone" required>
        </div>
        <div class="form-group">
          <label for="nic">NIC:</label>
          <input type="text" class="form-control" id="nic" required>
        </div>
        <div class="form-group">
          <label for="degree">Degree:</label>
          <input type="text" class="form-control" id="degree" required>
        </div>
        <div class="form-group">
          <label for="enrollmentNumber">Enrollment Number:</label>
          <input type="text" class="form-control" id="enrollmentNumber" required>
        </div>

        <div class="form-group">
          <label for="sportsName">Sports Name of Resignation:</label>
          <select class="form-control" id="sportsName" required>
            <option value="">Select a sport</option>
            <option value="Football">Football</option>
            <option value="Basketball">Basketball</option>
            <option value="Tennis">Tennis</option>

          </select>
        </div>
        <div class="form-group">
          <label for="reason">Reason for Resignation:</label>
          <textarea class="form-control" id="reason" rows="4" required></textarea>
        </div>
        <br>
        <button style="background-color:darkblue;" type="submit" class="btn btn-dark">Submit</button>
      </form>
    </div>-->

  <!--
  <script>
    document.getElementById('letterType').addEventListener('change', function () {
      const selectedLetter = this.value;
      document.getElementById('absenceForm').style.display = selectedLetter === 'absence' ? 'block' : 'none';
      document.getElementById('resignationForm').style.display = selectedLetter === 'resignation' ? 'block' : 'none';
    });
  </script>
-->

  <br><br>

  <footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
    <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script>
  function confirmSubmission() {
    // You can customize the confirmation message here
    if (confirm('Are you sure you want to submit this absence record?')) {
      return true; // If the user confirms, proceed with form submission
    } else {
      return false; // If the user cancels, prevent form submission
    }
  }
</script>

</body>

</html>