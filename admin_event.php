<?php

include_once "./Class/Events.php";

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
    <!-- Include Bootstrap and CSS styles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom CSS if needed -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
 <script src="https://kit.fontawesome.com/f2ab1a3f38.js" crossorigin="anonymous"></script>

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .sidebar {
            background-color: #0A0B4F;
            color: white;
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: white;
        }

        .table {
            font-size: 14px;
        }

        .table th,
        .table td {
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
                    <!-- Content Area -->
            <main class="col-md-10 col-12 ms-sm-auto">
             
            <div class="container">
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
                                        <input type="submit" name="submit" class="btn btn-primary" style="float:right; background-color: darkblue; margin-top: 10px;" value="Create">
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
                                        <th>Action</th>
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
                                                    echo "<td>";
/*
echo "
<a href='delete_event.php?event_id=" . $data['id'] . "' class='btn btn-danger btn-sm' onclick='return confirmDelete();'>Delete</a>";*/


  echo "<a href='delete_event.php?event_id=".$data['id']."' class='btn btn-danger btn-sm' onclick='confirmDelete(" . $data['id'] . "); return false;'>Delete</a>";

    echo "</td>";


   /*                                               
  echo "<td> 
             <button class='btn btn-danger btn-sm' onclick='deleteEvent(" . $data['id'] . ")'><i class='fas fa-trash'></i></button>
             </td>";*/

  


                                                    
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
            
            </main>

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



<script>
    // Function to confirm deletion
    function confirmDelete(eventId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If confirmed, redirect to delete_event.php with event_id
                window.location.href = 'delete_event.php?event_id=' + eventId;
            }
        });
    }

    // Function to display SweetAlert success message
    function showSuccessMessage() {
        Swal.fire({
            title: 'Deleted!',
            text: 'Event has been deleted.',
            icon: 'success',
            timer: 1500 // Change or remove the timer as needed
        });
    }
</script>


<script>
    // Check for deletion success and trigger SweetAlert message
    const urlParams = new URLSearchParams(window.location.search);
    const deleteSuccess = urlParams.get('deleteSuccess');
    if (deleteSuccess === '1') {
        showSuccessMessage();
    }
</script>







    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

</body>

</html>