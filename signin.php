<?php
$message = null;
if (isset($_GET["status"])) {
    $status = $_GET["status"];
    if ($status == 0) {
        $message = "<h6 class='text-danger'>Please fill out the entire registration form.</h6>";
    } elseif ($status == 1) {
        $message = "<h6 class='text-danger'>Please make sure to fill out all required fields in the form.</h6>";
    } elseif ($status == 2) {
        $message = "<h6 class='text-success'>Congratulations! You have successfully registered with UWU Sport Council.</h6>";
    } elseif ($status == 3) {
        $message = "<h6 class='text-danger'>Registration failed. An account with this email address already exists. Please use a different email for registration.</h6>";
    } elseif ($status == 4) {
        $message = "<h6 class='text-danger'>The password should be at least 8 characters long.</h6>";
    } elseif ($status == 5) {
        $message = "<h6 class='text-danger'>The password should meet complexity requirements: include at least one uppercase letter, one lowercase letter, one digit, and one special character.</h6>";
    } elseif ($status == 6) {
        $message = "<h6 class='text-danger'>The passwords you entered do not match. Please make sure they match.</h6>";
    } elseif ($status == 7) {
        $message = "<h6 class='text-danger'>Please enter a valid birthday. It should not be a future date.</h6>";
    } else {
        $message = "<h6 class='text-danger'>An error occurred during the registration process. Please try again later.</h6>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Sign In</title>
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
            border: 2px solid darkblue;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            display: none;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;

        }

        .form-select {
            padding: 10px;
            /* Add padding to the select element */
            width: 100%;
            /* Set the width to 100% to expand it within its container */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <img style="width:150px; height:50px;" src="images/logo.jpg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home_page.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_tournament.php">Tournament</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sports_kit.php">Sports kits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="my_letters_1.php">Letters</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="user_meeting_and_notice.php">Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donation1.php">Donations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="feedback_page.php">Feedbacks</a>
                </li>


            </ul>
        </div>
    </nav>


    <!-- Registration Form -->
    <div id="registrationForm" class="form-container">
        <h3 style="color: darkblue;" class="mb-3">Create an account for university students!</h3>
        <div class="container mt-5">
            <div class="registration-Form">
                <form action="registration.php" method="post" id="registrationForm">

                    <?php echo $message; ?>
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" class="form-control" name="full_name" id="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" name="district" id="district" required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" class="form-control" name="birthday" id="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="nic">NIC:</label>
                        <input type="text" class="form-control" name="nic" id="nic" required>
                    </div>
                    <div class="form-group">
                        <label for="degree">Degree:</label>
                        <input type="text" class="form-control" name="degree" id="degree" required>
                    </div>
                    <div class="form-group">
                        <label for="faculty">Faculty:</label>
                        <input type="text" class="form-control" name="faculty" id="faculty" required>
                    </div>
                    <div class="form-group">
                        <label for="enrollmentNo">Enrollment No:</label>
                        <input type="text" class="form-control" name="enrollment_no" id="enrollmentNo" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNo">Phone No:</label>
                        <input type="text" class="form-control" name="phone_no" id="phoneNo" required>
                    </div>
                    <div class="form-group">
                        <label for="universityEmail">University Email:</label>
                        <input type="text" class="form-control" name="university_email" id="universityEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password:</label>
                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female"
                                required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sportType">Select Relevant Sport Type:</label>
                        <select class="form-control" name="sport_type" id="sportType" required>
                            <option value="">Select Sport Type</option>
                            <option value="football">Football</option>
                            <option value="basketball">Basketball</option>
                            <option value="tennis">Tennis</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="medicalIssues">If having medical issues, mention:</label>
                        <textarea class="form-control" id="medicalIssues" name="medical_issues" rows="3"
                            required></textarea>
                    </div><br>
                    <button style="background-color: darkblue;" type="submit" class="btn btn-primary" name="submit" onclick="confirmRegistration()">Register Now</button>
                    <br><br>
                    <p>already have an account? <a href="index.php">login now</a></p>
                    
                </form>
            </div>
        </div>
    </div>
    <footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
        <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function confirmRegistration() {
        if (confirm("Do you want to register with UWU Sport Council?")) {
            // User clicked OK, submit the form programmatically
            document.getElementById("registrationForm").submit();
        } else {
            // User clicked Cancel, do nothing
        }
    }

    // JavaScript to toggle the visibility of the registration form
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("registrationForm").style.display = "block";
    });
</script>


</body>

</html>