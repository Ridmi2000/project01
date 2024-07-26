<?php
require_once('classes/DbConnector.php');
require_once('classes/SportKit.php');

$sportKit = new \classes\SportKit(); // Creating an instance of SportKit class

$kits = $sportKit->getAllSportsKits(); // Fetching data using the instance
$deleteSuccess = isset($_GET['deleteSuccess']) ? $_GET['deleteSuccess'] : null;
// Rest of your HTML code...
?>


<?php
// Check if the form is submitted for editing
if (isset($_POST['saveChanges'])) {
    $editedKitId = $_POST['editKitId'];
    $editedSportName = $_POST['sportName'];
    $editedAvailableColors = $_POST['availableColors'];
    
    // Perform the necessary update operations in your database based on the edited data
    // Execute your update query here
    
    // Redirect or perform any necessary actions after the update
    header("Location: admin_sport_kit.php"); // Redirect to the desired page after updating
    exit();
}
?>


<?php
require_once('classes/DbConnector.php');
require_once('classes/Order.php'); // Include the Order class file

try {
    $dbConnection = \classes\DbConnector::getConnection();
    $order = new \classes\Order($dbConnection);
    $orders = $order->viewOrders();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <style>
    /* Your CSS styles */
    
    /* Customize your styles here */
    .sidebar {
      background-color: #0A0B4F;
      color: white;
      height: 1000px;
    }

    .sidebar .nav-link {
      color: white;
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

  .sidebar {
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    background-color: #0A0B4F;
    color: white;
    overflow-y: auto; /* Allow scrolling within the sidebar */
    height: 100%; /* Full height of the viewport */
    width: 300px; /* Set the desired width */
    z-index: 1; /* Ensure it's above the content */
  }

body {
    overflow-x: hidden; /* Prevent horizontal scrolling */
}
  /* Adjust the main content area */
  .main-content {
    margin-left: 300px; /* Adjust the left margin to accommodate the fixed sidebar */
    /* Other styles for the main content */
    z-index: 2; /* Set a higher z-index for the content area */
    position: relative; /* Ensure proper stacking context */
  }
  
  </style>
</head>
<body>
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
                            <a class="nav-link active" href="dashboard_time_table.php">time table</a>
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


      
        <div class="col-md-10 col-12 mt-4 main-content">
        <div class="row justify-content-center align-items-center">

          <div class="col-md-6">
            <div class="card text-center">
              <div class="card-body d-flex flex-column align-items-center">
                <img style="width:200px; height:200px;" src="images/download.png">
                <!-- Card 1 Content -->
                <a style="background-color: darkblue; width: 400px;" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tableModal">view sports kits</a>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card text-center">
              <div class="card-body d-flex flex-column align-items-center">
               <img style="width:200px; height:200px;" src="images/image2.png"> 

               <a style="background-color: darkblue; width: 400px;" href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSportKitModal">Add New Sports Kit</a>

             </div>
           </div>
         </div>

                 <div class="col-md-12 mt-4">
            <div class="table-responsive">
              <table class="table table-bordered">

    <thead>
      <tr>
        <th>order id</th>
        <th>student name</th>
        <th>enrollment number</th>
        
        <th>sport kit id</th>
        <th>color</th>
        <th>quantity</th>
        <th>ordered date & time</th>
        
      </tr>
    </thead>
  <tbody>
    <?php foreach ($orders as $key => $order) : ?>
        <tr>
            
            <td><?= isset($order['order_id']) ? $order['order_id'] : '' ?></td>
            <td><?= isset($order['student_name']) ? $order['student_name'] : '' ?></td>
            <td><?= isset($order['enrollment_number']) ? $order['enrollment_number'] : '' ?></td>
            <td><?= isset($order['sport_kit_id']) ? $order['sport_kit_id'] : '' ?></td>
            <td><?= isset($order['selected_color']) ? $order['selected_color'] : '' ?></td>
            <td><?= isset($order['quantity']) ? $order['quantity'] : '' ?></td>
            
            <td><?= isset($order['order_date']) ? $order['order_date'] : '' ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
      </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



                 <!-- Modal for adding a new sports kit -->
<!-- Modal for adding a new sports kit -->

                <!-- Card 2 Content -->
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for displaying a table -->
  <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tableModalLabel">sport kit details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Place your table content here -->
          <table class="table">
            <thead>
              <tr>
                <th>Sport Kit Id</th>
                <th>Sport Kit Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>material</th>
                <th>image path name</th>
                <th>action</th>
                <!-- Add more table headers if needed -->
              </tr>
            </thead>
            <tbody>
              <?php
foreach ($kits as $kit) {
    echo "<tr>";
    echo "<td>{$kit['id']}</td>";
    echo "<td>{$kit['sportName']}</td>";
    echo "<td>{$kit['availableColors']}</td>";
    echo "<td>{$kit['availableSizes']}</td>";
    echo "<td>{$kit['price']}</td>";
    echo "<td>{$kit['description']}</td>";
    echo "<td>{$kit['image']}</td>";
    echo "<td>";
   
   

echo "
<a href='deleteKit.php?kit_id=" . $kit['id'] . "' class='btn btn-danger btn-sm' onclick='return confirmDelete();'>Delete</a>";




    echo "</td>";
    echo "</tr>";
}
?>









            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <!-- Additional functionality/buttons if needed -->
        </div>
      </div>
    </div>
  </div>






<div class="modal fade" id="addSportKitModal" tabindex="-1" aria-labelledby="addSportKitModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSportKitModalLabel">Add New Sports Kit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addSportKitForm" action="save_sport_kit.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="sportName" class="form-label">Sport Kit Name</label>
            <input type="text" class="form-control" name="sportName" id="sportName" required>
          </div>
          <div class="mb-3">
            <label for="availableColors" class="form-label">Available Colors</label>
            <input type="text" class="form-control" name="availableColors" id="availableColors" required>
          </div>
          <div class="mb-3">
            <label for="availableSizes" class="form-label">Available Sizes</label>
            <input type="text" class="form-control" name="availableSizes" id="availableSizes" required>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" name="image" id="image" required>
          </div>

          <div class="modal-footer">
              <input type="submit" class="btn btn-primary" value="Submit">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
          </div>
        </form>

</div>
</div>
</div>
</div>










<!-- Your existing HTML code remains unchanged -->

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const success = urlParams.get('success');

    if (success === '1') {
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Sport Kit added successfully!',
      });
      const urlWithoutParams = window.location.origin + window.location.pathname;
      window.history.replaceState({}, document.title, urlWithoutParams);
    } else if (success === '0') {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'There was an error adding the Sport Kit.',
      });
      const urlWithoutParams = window.location.origin + window.location.pathname;
      window.history.replaceState({}, document.title, urlWithoutParams);
    }
  });

  const addSportKitForm = document.getElementById('addSportKitForm');

  addSportKitForm.addEventListener('submit', function (event) {
    event.preventDefault();

    Swal.fire({
      title: 'Are you sure?',
      text: 'Do you want to submit this Sport Kit?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, submit it!',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Sport Kit added successfully!',
        });

        // You can also perform additional actions here before form submission
        addSportKitForm.submit(); // This will submit the form
      }
    });
  });




    function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
    }


    document.addEventListener("DOMContentLoaded", function () {
    const deleteSuccess = "<?php echo $deleteSuccess ?>";

    if (deleteSuccess === '1') {
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: 'Sport Kit deleted successfully!',
      });
      const urlWithoutParams = window.location.origin + window.location.pathname;
      window.history.replaceState({}, document.title, urlWithoutParams);
    }
  });



    // JavaScript to handle edit button click and populate form fields
$(document).ready(function() {
  $('a[data-target="#editModal"]').on('click', function() {
    var kitId = $(this).data('id');
    var sportName = $(this).closest('tr').find('td:eq(1)').text();
    var availableColors = $(this).closest('tr').find('td:eq(2)').text();
    // Retrieve other fields as needed and set their values in the form

    $('#editKitId').val(kitId);
    $('#editSportName').val(sportName);
    $('#editAvailableColors').val(availableColors);
    // Set other field values in a similar way
  });
});


</script>

<!-- Remaining HTML code remains unchanged -->



  <!-- Include Bootstrap JS with Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
