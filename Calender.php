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
<html lang="en">
<head>
  <title>Edit Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
 <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
 <script src="https://kit.fontawesome.com/f2ab1a3f38.js" crossorigin="anonymous"></script>
</head>


<style type="text/css">
    




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


</style>
<body>

   <div class="container-fluid">
    <div class="row">
      <!-- Vertical Navigation Bar -->
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
                          <a class="nav-link active" href="./add_sport.php">Add Sport</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="./list_sports.php">Sport List</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="./Teams.php">Teams Management</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="./EquipmentStock.php">Equipment Management</a>
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

         <div class="col-md-10 col-12 main-content">
  
   

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-8">
                 <div id='calendar'></div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="card" >
                        <div class="card-body">
                            <form action="Calender.php" method="POST">
                                <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="title" value="" required="">
                                </div>
                                <div class="form-group">
                                <label >Description:</label>
                                <input type="text" class="form-control" name="description" value="" required="">
                                </div>
                                <div class="form-group">
                                <label >Start Date:</label>
                                <input type="date" class="form-control" name="start_date" value="" required="">
                                </div>
                                <div class="form-group">
                                <label >End Date:</label>
                                <input type="date" class="form-control" name="end_date" value="" required="">
                                </div>
                                <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Create">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="card" >
                        <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Event</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>

                            <tbody>
                            <?php 
                                    if (is_array($event_table )) {
                                        foreach ($event_table  as $data) {
                                            // Your loop logic here
                                            $startDate = date('Y-m-d', strtotime($data['start']));
                                            $endDate = date('Y-m-d', strtotime($data['end']));

                                            echo "<tr>";
                                            echo "<td>". $data['title']. "</td>";
                                            echo "<td>". $data['description']. "</td>";
                                            echo "<td>". $startDate. "</td>";
                                            echo "<td>". $endDate. "</td>";
                                            echo "<td> 
                                             <button class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
   
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>