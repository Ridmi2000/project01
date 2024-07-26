<?php

    $message = null;
    if (isset($_GET["status"])) {
        $status = $_GET["status"];
        if ($status == 0) {
            $message = "<h2 class='text-danger'>Required values were not submitted</h2>";
        } elseif ($status == 1) {
            $message = "<h2 class='text-danger'>Username or password are required to enter</h2>";
        } else {
            $message = "<h2 class='text-danger'>Username or password is incorrect. Please try again</h2>";
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
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Donations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="./Donations/staff/money_donation.php">Fund by Money</a>
          <a class="dropdown-item" href="./Donations/staff/equipment_donation.php">Fund by Equipment</a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="feedback_page.php">Feedbacks</a>
      </li>
      
     

    </ul>
  </div>

</nav>
<br><br>

    <!-- login Form -->
    <div id="loginForm" class="form-container">
        <h3 style="color: darkblue;" class="mb-3">Welcome!</h3>
        <div class="container mt-5">
            <div class="login-form">
                <form action="login.php" method="post">
                    <?php echo $message; ?>
                    
                    <div class="form-group">
                        <label for="universityEmail">University Email:</label>
                        <input type="text" class="form-control" name="university_email" id="universityEmail" value="<?php if(!empty($email)) { echo $email; } elseif (isset($_COOKIE["remember_email"])) {echo $_COOKIE["remember_email"];}?>"  required>
                    </div>
                  

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <label>
                    <input type="checkbox" name="remember" class="check" <?php if(!empty($remember)) { ?> checked <?php } elseif(isset($_COOKIE["remember"])) { ?> checked <?php } ?>> Remember Me

                        </label>
                     
                        <p>don't have an account? <a href="signin.php">register now</a></p>
                   <br>
                    <button style="background-color:darkblue;" type="submit" class="btn btn-primary"
                        name="submit">Login Now</button>
                </form>
            </div>
        </div>
    </div><br><br>
    <footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
        <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // JavaScript to toggle the visibility of the registration form
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("loginForm").style.display = "block";
        });
    </script>
</body>

</html>
