<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <title>Volleyball</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
    /* Customize your styles here */
    .sports-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

       .sport-button {
    width: 150px; /* Set a fixed width for all buttons */
    background-color: darkblue;
    color: white; /* Set text color to white */
    padding: 50px 20px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.sport-button:hover {
    background-color: darkblue; /* Keep the background color unchanged on hover */
    color: white; /* Set text color to white on hover */
}
    /* Customize your styles here */
  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: #0A0B4F;
    color: white;
    overflow-y: auto;
    height: 100%;
    width: 250px; /* Adjust the width if needed */
    z-index: 1;
    padding: 20px; /* Add padding to the sidebar */
    margin: 0; /* Reset margin */
  }

  .main-content {
    padding: 20px;
    z-index: 2;
    position: relative;
    margin-left: 250px; /* Adjust margin to fit the sidebar */
  }

    .sidebar .nav-link {
      color: white;
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

    .content-box img {
      max-width: 100px;
      height: auto;
      margin-bottom: 10px;
    }

    .count {
      font-size: 24px;
      color: #0A0B4F;
    }

    .label {
      font-size: 18px;
      color: #555;
    }

    .table {
      font-size: 14px;
    }

    .table th, .table td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }

    .table th {
      background-color: #0A0B4F;
      color: white;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f2f2f2;
    }

 
 .content-box {
    /* Your existing styles for content boxes */
    margin: 10px 0; /* You can adjust this margin as needed */
  }




body {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}
  /* Adjust the main content area */
  .main-content {
    margin-left: 400px; /* Adjust the left margin to accommodate the fixed sidebar */
    /* Other styles for the main content */
    z-index: 2; /* Set a higher z-index for the content area */
    position: relative;
  }


/* CSS */
.container {
  display: flex;
  flex-direction: row;
}

.sidebar {
  flex: 0 0 250px; /* Set a specific width for the sidebar */
  background-color: #0A0B4F;
  color: white;
  /* Other styles for the sidebar */
}

.content {
  flex: 1; /* Let the content area take up the remaining space */
  padding: 20px;
  /* Other styles for the content area */
}




  </style>
</head>
<body>
<div class="container-fluid">
        <div class="row">

           
         <!-- Sidebar -->
            <nav class="col-md-2 col-12 sidebar p-0">
             <div class="position-sticky">
          <h4 class="my-3 text-center">Dashboard</h4>
          <ul class="nav flex-column">

          
            <a href="logout.php" class="btn btn-outline-light btn-primary btn-light" style="color: black;">Logout</a>

<br>

              <li class="nav-item">
              <a class="nav-link active" href="admin_dashboard.php">Home</a>
            </li>

            
            <li class="nav-item">
                            <a class="nav-link active" href="admin_registrations.php">admin registrations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="player_registrations.php">player registrations</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" href="admin_absence_letters.php">absence letters</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="add_resignation.php">add resignations</a>
                        </li>

                       

                        <li class="nav-item">
                            <a class="nav-link active" href="view_donation.php">view donations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="admin_notices.php">notices</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" href="admin_event.php">Calender</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="admin_sport_kit.php">sports kits</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="mark_attendence.php">mark attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="view_attendance1.php">view attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="2.php">time table</a>
                        </li>



           

            <li class="nav-item">
              <a class="nav-link active" href="admin_feedback.php">feedback</a>
            </li>

            <li class="nav-item">
                            <a class="nav-link active" href="admin_profile.php">profile</a>
                        </li>
            

            <!-- Add more navigation items here -->
          </ul>
        </div>
      </nav>
                    <!-- Content Area -->
    <main class="col-md-10 col-12 ms-sm-auto">
    <div class="mb-3">
    <h2 style="color:#0A0B4F; padding:15px;">Time Table</h2>
    <div class="container" style="justify-content:center">
        <div class="row">
            <div class="col">
                <div class="sports-container">
                    <a href="./Elle/elle.php" class="sport-button">Elle</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Basketball/basketball.php" class="sport-button">Basketball</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">      
                    <a href="./Volleyball/volleyball.php" class="sport-button">Volleyball</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Chess/chess.php" class="sport-button">Chess</a>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Football/football.php" class="sport-button">Football</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Cricket/cricket.php" class="sport-button">Cricket</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">      
                    <a href="/time_table _ 1/Tennis/tennis.php" class="sport-button">Tennis</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Weightlifting/weightlifting.php" class="sport-button">Weightlifting</a>
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col">
                <div class="sports-container">
                     <a href="/time_table _ 1/Road Race/road race.php" class="sport-button">Road Race</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Baseball/baseball.php" class="sport-button">Baseball</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">      
                    <a href="/time_table _ 1/Netball/netball.php" class="sport-button">Netball</a>
                </div>
            </div>
            <div class="col">
                <div class="sports-container">
                    <a href="/time_table _ 1/Carrom/carrom.php" class="sport-button">Carrom</a>
                </div>
            </div>
        </div> 

    </div>

       
    </main>
  </div>
  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Top Navigation Bar -->
   

 
</body>
</html>
