<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to the admin login page if not logged in
    exit();
}



require_once('classes/DbConnector.php');
require_once('classes/SportKit.php');
require_once 'classes/User.php';

use classes\SportKit;
use classes\DbConnector;
use classes\User;

// Fetch data from the database
$kits =SportKit::getAllKits(); // Assuming you have a method in SportKit class to fetch all kits

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $db = DbConnector::getConnection();
    $user = User::getUserById($db, $user_id);

    // Fetch user details from the database
    $userData = $db->query("SELECT * FROM university_students WHERE id = $user_id")->fetch();

    // Check if user data exists and pre-fill the form fields
    if ($userData) {
        $name = $userData['full_name'];
        $contact_number = $userData['phone_no'];
        $enrollment_no = $userData['enrollment_no'];

        // ... (other fields you want to pre-fill)
    }
}



$orderSuccessMessage = '';
if (isset($_SESSION['order_success_message'])) {
    $orderSuccessMessage = $_SESSION['order_success_message'];
    unset($_SESSION['order_success_message']); // Clear the message after storing it
}

if (!empty($orderSuccessMessage)) {
    echo "<script>
            window.onload = function() {
                alert('$orderSuccessMessage');
            };
          </script>";
}
?>

<?php
    // Display SweetAlert if order success message is set
    if (isset($_SESSION['order_success_message'])) {
        $successMessage = $_SESSION['order_success_message'];
        unset($_SESSION['order_success_message']); // Unset after capturing

        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '" . $successMessage . "',
            });
        </script>";
    }
    ?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<style>







.form-border {
  border: 2px solid #ccc; /* Simple line border */
  padding: 20px;
  border-radius: 5px;
  border-color: darkblue;
}

/* Remove the blue outline for focus */
.form-control:focus {
  border-color: #ced4da;
  box-shadow: none;
  border-color: darkblue;
}

.navbar-nav .nav-link {
  color: white !important; /* Set the font color for navigation links */
}


.navbar-nav .nav-link:hover {
      background-color: white; /* Change this to your desired hover color */
      color: black !important; /* Change this to your desired hover text color */
    }




.navbar{
background-color:#0A0B4F;



}

   .gallery {
            width: 300px;
            height: 400px;
            position: relative;
            perspective: 1000px;
            margin: 50px auto;
        }

        .image-container {
            width: 100%;
            height: 100%;
            position: absolute;
            transform-style: preserve-3d;
            transition: transform 1s;
        }

        .image {
            width: 300px; /* Adjusted width */
            height: 100px; /* Adjusted height */
            position: absolute;
            backface-visibility: hidden;
        }

        .image img {
            width: 100%; /* Image width 100% of the container */
            height: 100%; /* Image height 100% of the container */
        }

        .image:nth-child(1) {
            transform: rotateY(0deg);
        }

        .image:nth-child(2) {
            transform: rotateY(45deg);
        }

        .image:nth-child(3) {
            transform: rotateY(90deg);
        }

        .image:nth-child(4) {
            transform: rotateY(135deg);
        }

        .image:nth-child(5) {
            transform: rotateY(180deg);
        }

        .image:nth-child(6) {
            transform: rotateY(225deg);
        }

        .image:nth-child(7) {
            transform: rotateY(270deg);
        }

        .image:nth-child(8) {
            transform: rotateY(315deg);
        }

        .gallery:hover .image-container {
            transform: rotateY(180deg);
        }

.image {
    width: 100%;
    height: auto;
    position: absolute;
    backface-visibility: hidden;
}

.image img {
    max-width: 100%;
    height: auto;
}



.title {
  font-size: 60px;
  font-weight: bolder;
   color:darkblue;
}

@media (max-width: 768px) {
  .title {
    font-size: 30px;
    margin-top: 30px;
  }
}


</style>

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
      
      <li class="nav-item">
        <a class="nav-link" href="sport_kit.php">Sports kits</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="donation.php">Donations</a>
      </li>
     
     
      
       <li class="nav-item">
        <a class="nav-link" href="feedback_page.php">Feedbacks</a>
      </li>
      
      <li class="nav-item">
      <a style="background-color:darkblue; border-color: darkblue; margin-right: 10px;" href="logout.php" class="btn btn-dark">Logout</a>
      </li>
     

    </ul>
  </div>
  <a class="nav-item" href="profile.php">
  <img class="rounded-profile" src="images/profile1.jpg" alt="Profile Icon" style="width:50px; height:50px;">
</a>

</nav>


<br><br>



<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-12 col-md-6">
      <h1 class="title">Find Your Sport Kits</h1>
       <p style="text-align: justify;" class="subtitle">

"Sport Council offers a wide range of high-quality sports kits tailored for various athletic pursuits. Our collection includes gear and apparel designed to meet the needs of athletes across different sports. From durable equipment to comfortable attire, our sports kits are crafted to elevate the performance and experience of both amateur and professional athletes. We prioritize functionality, comfort, and style, ensuring that athletes have the right tools to excel in their sporting endeavors.".</p>
    </div>

    <div class="col-12 col-md-6">
      <div class="gallery">
        <div class="image-container">


            <div class="image">
               <img style="width:400px; height:400px" src="images/1.jpeg" alt="Image 1">
               
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/2.webp" alt="Image 2">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/3.jpg" alt="Image 3">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/4.jpeg" alt="Image 4">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/5.webp" alt="Image 5">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/6.jpg" alt="Image 6">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/7.webp" alt="Image 7">
            </div>
            <div class="image">
                <img style="width:400px; height:400px" src="images/8.jpg" alt="Image 8">
            </div>
        </div>
    </div>
</div>
    </div>
  </div>




<div class="container mt-5 mb-5">
    <h1 style="color: darkblue;">OUR NEW ITEMS</h1>
    <div class="row">
       <?php foreach ($kits as $kit) : ?>
    <div class="col-md-4 mt-5">
        <div style="border-color: darkblue;" class="card">
            <img style="height: 250px; width: 350px; padding: 30px;" src="uploads/<?php echo isset($kit['image']) ? $kit['image'] : ''; ?>" class="card-img-top img-fluid" alt="Card Image">
            <div class="card-body">
                <h6 class="card-title">Sport Kit ID: <?php echo isset($kit['id']) ? $kit['id'] : ''; ?></h6>
                <h6 class="card-title">Kit type: <?php echo isset($kit['sportName']) ? $kit['sportName'] : ''; ?></h6>
                <h6 class="card-title">Available colors: <?php echo isset($kit['availableColors']) ? $kit['availableColors'] : ''; ?></h6>
                <h6 class="card-title">Available sizes: <?php echo isset($kit['availableSizes']) ? $kit['availableSizes'] : ''; ?></h6>
                <h6>Price: LKR <?php echo isset($kit['price']) ? $kit['price'] : ''; ?></h6>
                <h6 class="card-text">material: <?php echo isset($kit['description']) ? $kit['description'] : ''; ?></h6>
                <button type="button" class="btn btn-primary open-modal" data-toggle="modal" data-target="#sportKitModal"
                        data-kitid="<?php echo isset($kit['id']) ? $kit['id'] : ''; ?>"
                        data-kitname="<?php echo isset($kit['sportName']) ? $kit['sportName'] : ''; ?>">
                    Order Now
                </button>
            </div>
        </div>
    </div>
<?php endforeach; ?>



    <!-- Repeat the above code for more cards (change image and content) -->
<div class="modal-body">

     

<!-- Button to trigger the modal -->


<!-- Modal -->
<div class="modal" id="sportKitModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Your form goes here -->
              
                    <form action="process_order.php" method="post" onsubmit="return confirm('Are you sure you want to place the order?');">

                    <div class="form-group">
                        <label for="StudentName">Student Name</label>
                        <input type="text" name="StudentName" class="form-control" value="<?php echo isset($name) ? $name : ''; ?>" id="StudentName"readonly>
                    </div>

                    <div class="form-group">
    <label for="EnrollmentNumber">Enrollment number</label>
    <input type="text" name="EnrollmentNumber" class="form-control"  value="<?php echo isset($enrollment_no) ? $enrollment_no : ''; ?>" id="EnrollmentNumber" readonly>
</div>

                    <div class="form-group">
    <label for="contactNumber">Contact number</label>
    <input type="text" name="contactNumber" class="form-control" value="<?php echo isset($contact_number) ? $contact_number : ''; ?>" id="contactNumber" readonly>
</div>

                    <div class="form-group">
                        <label for="sportKitID">Sport Kit ID</label>
                        <input type="text" name="sportKitID" class="form-control" id="sportKitID"readonly>
                    </div>
                    <div class="form-group">
                        <label for="sportKitName">Sport Kit Name</label>
                        <input type="text" name="sportKitName" class="form-control" id="sportKitName"readonly>
                    </div>
                    <div class="form-group">
                        <label for="colors">Select Color</label>
                        <select class="form-control" name="selectedColor" id="colors">
                            <option>Red</option>
                            <option>Blue</option>
                            <option>Green</option>
                            <!-- Add more color options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sizes">Select Size</label>
                        <select class="form-control" name="selectedSize" id="sizes">
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                            <!-- Add more size options as needed -->
                        </select>

                        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" min="0" required>
        </div>




                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>


            </div>
        </div>
    </div>
</div>







      <script>
        $(document).ready(function () {
            $('.open-modal').click(function () {
                var kitID = $(this).data('kitid');
                var kitName = $(this).data('kitname');
                $('#sportKitID').val(kitID);
                $('#sportKitName').val(kitName);
            });
        });
    </script>


    <?php


require_once('classes/DbConnector.php');
require_once('classes/SportKit.php');
require_once('classes/User.php');

$db = DbConnector::getConnection();

// Fetch data from the database
$kits = SportKit::getAllKits(); // Assuming you have a method in SportKit class to fetch all kits

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['user_id'])) {
        // Retrieve form data
        $user_id = $_SESSION['user_id'];
        $studentName = $_POST['StudentName'];
        $enrollmentNumber = $_POST['EnrollmentNumber'];
        $contactNumber = $_POST['contactNumber'];
        $sportKitID = $_POST['sportKitID'];
        $sportKitName = $_POST['sportKitName'];
        $selectedColor = $_POST['colors'];
        $selectedSize = $_POST['sizes'];
        $quantity = $_POST['quantity'];

        // Insert data into the database
        $stmt = $db->prepare("INSERT INTO orders (user_id, student_name, enrollment_number, contact_number, sport_kit_id, sport_kit_name, selected_color, selected_size, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssisssi", $user_id, $studentName, $enrollmentNumber, $contactNumber, $sportKitID, $sportKitName, $selectedColor, $selectedSize, $quantity);
        
        if ($stmt->execute()) {
            // Order successfully saved
            echo "Order placed successfully!";
        } else {
            // Handle database insertion failure
            echo "Error placing order: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
    

</body>
</html>
