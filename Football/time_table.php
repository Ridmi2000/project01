<!doctype html>
<html lang="en">

<head>
  <title>Time Table</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="toastr/toastr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

<div class="container">
  <a style="background-color: darkblue; color: white;" href="../Page/1.php" class="btn btn-primary mt-3"><i class="bi bi-arrow-left"></i></a>
 <h2 style="background-color: darkblue; color: white; padding: 10px;"class="text-center mt-1">Time Table-Football</h2>
   <table class="table table-striped table-hover mt-5 table-bordered border-info" id="data_tbl">
    
    <thead>
        <tr>
            <td colspan="8" class=""><h3 class="text-center text-primary">Morning</h3></td>
        </tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
       
        
    </thead>
    <tbody>
        <?php
        include("connection.php");
        
        $sql = "SELECT * FROM football WHERE id LIMIT 7";
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
       
        <?php  }?>
        </tr>
       
    </tbody>
   </table>
   <table class="table table-striped table-hover mt-5 table-bordered border-info" id="data_tbl">
    
    <thead>
        <tr>
            <td colspan="8" class=""><h3 class="text-center text-primary">Evening</h3></td>
        </tr>
        <th>Time</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wendsday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Satarday</th>
        <th>Sunday</th>
       
        
    </thead>
    <tbody>
        <?php
        include("connection.php");

        $sql = "SELECT * FROM football WHERE id > 9";
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
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
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







  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="toastr/toastr.min.js"></script>
  
</body>

</html>