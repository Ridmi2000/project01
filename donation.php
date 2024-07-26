<?php
require_once 'classes/Donation.php';
require_once 'classes/DbConnector.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $full_name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $contact_number = isset($_POST['phoneNo']) ? $_POST['phoneNo'] : '';
    $nic_number = isset($_POST['nic']) ? $_POST['nic'] : '';
    $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
    $donation_date = isset($_POST['donationDate']) ? $_POST['donationDate'] : '';
    $donation_amount = isset($_POST['donationAmount']) ? $_POST['donationAmount'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Create a new Donation object
    $donation = new classes\Donation(
        $full_name,
        $email,
        $address,
        $contact_number,
        $nic_number,
        $occupation,
        $donation_date,
        $donation_amount,
        $description
    );

    // Get a database connection
    $db = classes\DbConnector::getConnection();

    // Submit the donation
    $success = $donation->submitDonation($db);

    // Close the database connection
    $db = null;

    if ($success) {
        echo '<script>alert("Donation submitted successfully!");</script>';
    } else {
        echo '<script>alert("Error submitting donation. Please try again.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate to UWU Sports Council</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Add custom CSS styles for the form container */
        .form-container {
            border: 2px solid #007BFF;
            /* Set border color */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            /* Add a shadow effect */
            margin-bottom: 50px;
            max-width: 500px;
        }

        /* Add custom CSS styles for the form elements */
        .form-control {
            margin-bottom: 15px;
            /* Add some spacing between form elements */
        }

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
        <a class="nav-link" href="#">Sports</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="Page/1.php">Time table</a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="players.php">Notices</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sport_kit.php">Sports kits</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="letter.php">Letters</a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="Tournements.php">Calender</a>
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

    <img style="width: 100%; height:500px;" class="full-width-image" src="images/donation.jpg"
        alt="Full Width Image">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <center>
                    <h1>Donate to UWU Sports Council</h1>
                </center>
                <div class="form-container mx-auto">
                   
                        <form id="donationForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">

                        <!-- ... (your form fields) ... -->
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your name"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Your address" required>
                        </div>
                        <div class="form-group">
                            <label for="phoneNo">Contact Number:</label>
                            <input type="text" class="form-control" id="phoneNo" name="phoneNo"
                                placeholder="Your contact number" required>
                        </div>
                        <div class="form-group">
                            <label for="nic">NIC Number:</label>
                            <input type="text" class="form-control" id="nic" name="nic" placeholder="Your NIC number"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="occupation">Occupation:</label>
                            <input type="text" class="form-control" id="occupation" name="occupation"
                                placeholder="Your occupation" required>
                        </div>

                        <div class="form-group">
                            <label for="donationDate">Donation Date:</label>
                            <input type="date" class="form-control" id="donationDate" name="donationDate" required>
                        </div>
                        <div class="form-group">
                            <label for="donationAmount">Donation Amount (LKR):</label>
                            <input type="number" class="form-control" id="donationAmount" name="donationAmount"
                                placeholder="Enter donation amount" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description (optional):</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                placeholder="Your donation description"></textarea>
                        </div>
                        <button style="background-color: darkblue;" type="submit" class="btn btn-primary" onclick="return confirmSubmit()">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
        <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
    </footer>

    <script>
    function confirmSubmit() {
        return confirm("Are you sure you want to submit this donation?");
    }
</script>


    <!-- Include your JavaScript code here to handle form submission and update the table -->
</body>

</html>


