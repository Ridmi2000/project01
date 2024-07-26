<?php 

include_once "Class/Equipment.php";


 //create object from Equipment class
 $equipmentObj = new Equipment();

 //insert records into equipment table

 if(isset($_POST['submit'])){
  $equipmentObj->storeData($_POST);

 }

 // Delete record from table
 if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
  $deleteId = $_GET['deleteId'];
  $equipmentObj->deleteRecord($deleteId);
}
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Equipment Stock</title>
  <style>

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



      
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .admin-controls {
      display: none;
    }

    /* Some CSS to style the increase and decrease buttons */
    .quantity-btn {
      padding:10px;
      cursor: pointer;
      width:60px;
      border: 1px solid black;
      
    }
    .sidebar {
      background-color: #0A0B4F;
      color: white;
      min-height: 100vh;
      width: :350px;
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

      <main class="col-md-10 col-12 ms-sm-auto">
      <div class="container mt-4">

        <h1>Equipment Stock</h1>

      
        <table id="equipment-table">
          <tr>
            <th>Sports Name</th>
            <th>Type of Equipment</th>
            <th>Quantity</th>
            <th>Action</th>
          </tr>
          
          <tr>
          <form method='POST' action='EquipmentStock.php'>
              <td><input type="text" name="sports_name" required></td>
              <td><input type="text" name="equipment_type" required></td>
              <td>
                <span class="quantity-btn" onclick="decreaseQuantity(0)">-</span>
                <span id="quantity-0"><input type="text" name="qty" value="0" required></span>
                <span class="quantity-btn" onclick="increaseQuantity(0)">+</span>
              </td>
              <td><input type='submit' name='submit' value='Save Record'></td>
          </form>
          </tr>
          
          <?php 
                $equipments = $equipmentObj->displayData(); 
                if (is_array($equipments)) {
                  foreach ($equipments as $data) {
                      // Your loop logic here
                      echo "<tr>";
                      echo "<td>". $data['sports_name']. "</td>";
                      echo "<td>". $data['equipment_type']. "</td>";
                      echo "<td>". $data['qty']. "</td>";
                      echo "<td>
                      <a href='EquipmentEdit.php?editId=". $data['id']. "' style='color:green'>Edit</a>
                      <a href='EquipmentStock.php?deleteId=". $data['id']. "' style='color:red' onclick='confirm('Are you sure want to delete this record')'>Delete</a>
                      </td>";
                      echo "</tr>";
                  }
              }
      ?>
                  


        </table>

      </div>
      </main>
 
    

  
  <!-- <div class="button-container">
        <button onclick="addSports()">Add Sports</button>
    </div> -->

  <script>
    // Sample JavaScript functions for increasing and decreasing quantity
    function increaseQuantity(index) {
      const quantityElement = document.getElementById(`quantity-${index}`);
      let quantity = parseInt(quantityElement.firstChild.value);
      quantity += 1;
      quantityElement.firstChild.value = quantity;
    }

    function decreaseQuantity(index) {
      const quantityElement = document.getElementById(`quantity-${index}`);
      let quantity = parseInt(quantityElement.firstChild.value);
      if (quantity > 0) {
        quantity -= 1;
        quantityElement.firstChild.value = quantity;
      }
    }

    // Function to enable admin controls
    function enableAdminControls() {
      const adminControls = document.querySelector(".admin-controls");
      adminControls.style.display = "block";
    }

    // Call this function when the user is identified as an admin (you'll need to implement server-side user authentication)
    enableAdminControls();
    
    // function addSports() {
    //         // Code to add a new row dynamically
    //         var table = document.querySelector('table');
    //         var newRow = table.insertRow(-1);
           
    //         var sportsnameCell = newRow.insertCell(0);
    //         var typeofequipmentCell = newRow.insertCell(1);
    //         var quantityCell = newRow.insertCell(2);
            
    //         sportsnameCell.innerHTML = '<input type="text">';
    //         typeofequipmentCell.innerHTML = '<input type="text">';
    //         quantityCell.innerHTML = `<span class="quantity-btn" onclick="decreaseQuantity(0)">-</span>
    //                                   <span id="quantity-0"><input type="number" name="qty" value="0"></span>
    //                                   <span class="quantity-btn" onclick="increaseQuantity(0)">+</span>`;
    //     }
        

  </script>
</body>
</html>

