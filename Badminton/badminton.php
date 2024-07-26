<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <title>Badminton</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="toastr/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Top Navigation Bar Styles */
        .topnav {
            overflow: hidden;
            background-color: #001f3f; /* Dark Blue Color */
            color: white;
           
    
        }

        .topnav h1 {
            font-size: 36px;
            text-align: center;
            margin: 0;
            padding: 20px;
        }

        /* Side Navigation Bar Styles */
        .sidenav h1 {
      font-size: 24px;
      color: white;
      text-align: center;
      font-family: Arial, sans-serif;
    }

        .sidenav {
            height: 100%;
            width: 210px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #001f3f; /* Dark Blue Color */
            padding-top: 70px;
            text-align: left;
            font-family: Arial, sans-serif;
        }

        /* Links in the Side Navigation Bar */
        .sidenav a {
            padding: 8px 8px 8px 34px;
            text-decoration: none;
            font-size: 16px;
            color: white;
            display: block;
            transition: 0.3s;
            font-family: Arial, sans-serif;
        }

        /* Style for the Logout Button */
        .logout-button {
            background-color: white;
            color: #001f3f; /* Dark Blue Color */
            border: none;
            padding: 10px 60px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            margin-left: 20px;
            cursor: pointer;
        }

        /* Hover effect for links in the Side Navigation Bar */
        .sidenav a:hover {
            /*color: #ff5733; /* Orange Color */
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 250px;
            padding: none;
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <div class="topnav">
        <h1>Time Table</h1>
    </div>

    <!-- Side Navigation Bar -->
    <div class="sidenav">
    <h1>Dashboard</h1>
        <button class="logout-button">Logout</button>
        <a href="#">Home</a>
        <a href="#">Registration</a>
        <a href="#">Sportkits</a>
        <a href="#">Letters</a>
        <a href="#">Notices</a>
        <a href="#">Meetings</a>
        <a href="#">Tournaments</a>
        <a href="#">Feedbacks</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
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

     $sql = "SELECT * FROM badminton";
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
