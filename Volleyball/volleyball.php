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
  

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: none;
            
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
                            <a class="nav-link active" href="../admin_registrations.php">admin registrations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../player_registrations.php">player registrations</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link active" href="../admin_absence_letters.php">absence letters</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../add_resignation.php">add resignations</a>
                        </li>

                       

                        <li class="nav-item">
                            <a class="nav-link active" href="../view_donation.php">view donations</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../admin_notices.php">notices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../admin_event.php">Calender</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="../admin_sport_kit.php">sports kits</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="../mark_attendence.php">mark attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="../view_attendance1.php">view attendance</a>
                        </li>

                          <li class="nav-item">
                            <a class="nav-link active" href="../2.php">time table</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="../add_sport.php">Add Sport</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="../list_sports.php">Sport List</a>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link active" href="../Teams.php">Teams Management</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../EquipmentStock.php">Equipment Management</a>
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

    <!-- Main Content -->
    
        <table class="table mt-5 table-success table-striped" id="data_tbl">
        <thead>
     <th>Time</th>
     <th>Monday</th>
     <th>Tuesday</th>
     <th>Wednesday</th>
     <th>Thursday</th>
     <th>Friday</th>
     <th>Saturday</th>
     <th>Sunday</th>
     <th>Action</th>
     
 </thead>
 <tbody>
 <?php
     include("connection.php");

     $sql = "SELECT * FROM volleyball";
     $result = mysqli_query($conn,$sql);
     while ($row = mysqli_fetch_assoc($result)) {
    
     ?>
      <tr>
     <td><?php echo $row['time']; ?></td>
     <td><?php echo $row['monday']; ?></td>
     <td><?php echo $row['tuesday']; ?></td>
     <td><?php echo $row['wednesday']; ?></td>
     <td><?php echo $row['thursday']; ?></td>
     <td><?php echo $row['friday']; ?></td>
     <td><?php echo $row['saturday']; ?></td>
     <td><?php echo $row['sunday']; ?></td>
    
     <td>
         <button style=" background-color: #001f3f;" id="<?php echo $row['id']; ?>" class="edit btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" >Edit</button>
        
     </td>
     <?php  }?>
     </tr>
 </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="row">
        <div class="col-8">
        <form action="">
            <input type="text" name="id" id="id" hidden>
        <div class="mb-1">
            <input type="text" name="time" id="time" placeholder="time" class="form-control"Disabled>
        </div>
        <div class="mb-1">
            <input type="text" name="monday" id="monday" placeholder="monday" class="form-control" >
        </div>
        <div class="mb-1">
            <input type="text" name="tuesday" id="tuesday" placeholder="tuesday" class="form-control">
        </div>
        <div class="mb-1">
            <input type="text" name="wednesday" id="wednesday" placeholder="wednesday" class="form-control">
        </div>
        <div class="mb-1">
            <input type="text" name="thursday" id="thursday" placeholder="thursday" class="form-control">
        </div>
        <div class="mb-1">
            <input type="text" name="friday" id="friday" placeholder="friday" class="form-control">
        </div>
        <div class="mb-1">
            <input type="text" name="saturday" id="saturday" placeholder="saturday" class="form-control">
        </div>
        <div class="mb-1">
            <input type="text" name="sunday" id="sunday" placeholder="sunday" class="form-control">
        </div> 
        </form>
        </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="update">Save changes</button>
        </div>
 </div>
    </div>
    </div>
</main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
 integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
 integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="toastr/toastr.min.js"></script>
<script>
 $(document).ready(function () {
    $(document).on("click",".edit", function () {
     var id = $(this).attr("id");
    
     $.ajax({
         method: "POST",
         url: "get_data.php",
         data: {id:id},
         dataType: "json",
         success: function (data) {
             $("#id").val(data.id);
             $("#time").val(data.time);
             $("#monday").val(data.monday);
             $("#tuesday").val(data.tuesday);
             $("#wednesday").val(data.wednesday);
             $("#thursday").val(data.thursday);
             $("#friday").val(data.friday);
             $("#saturday").val(data.saturday);
             $("#sunday").val(data.sunday);

         }
     });
    });

   // update

   $("#update").click(function (e) { 
     e.preventDefault();
     var id = $("#id").val();
     var time = $("#time").val();
     var monday = $("#monday").val();
     var tuesday = $("#tuesday").val();
     var wednesday = $("#wednesday").val();
     var thursday = $("#thursday").val();
     var friday = $("#friday").val();
     var saturday = $("#saturday").val();
     var sunday = $("#sunday").val();

       $.ajax({
         method: "POST",
         url: "update_data.php",
         data: {
             check_update:true,
             id:id,
             time:time,
             monday:monday,
             tuesday:tuesday,
             wednesday:wednesday,
             thursday:thursday,
             friday:friday,
             saturday:saturday,
             sunday:sunday
         },
         success: function (response) {
            if(response == 1){
             toastr.options.progressBar = true;
             toastr.success('Data Updated Successfully',{timeOut: 1500});
             $("#data_tbl").load(location.href + " #data_tbl ");
             $("#exampleModal").modal("hide");
             
            } 
            
         }
       });

   });


 });
</script>
</body>
</html>
