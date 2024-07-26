<?php
require_once 'classes/DbConnector.php'; // Include DbConnector class
require_once 'classes/Feedback.php'; // Include Feedback class

use classes\Feedback;

// Create a database connection
$db = \classes\DbConnector::getConnection();

// Create a Feedback object
$feedbackText = new Feedback();

// Initialize delete message
$deleteMessage = '';

// Handle delete action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_feedback'])) {
  $feedbackIdToDelete = $_POST['feedback_id'];
  $deleted = $feedbackText->deleteFeedback($feedbackIdToDelete, $db);

  if ($deleted) {
    $deleteMessage = "Feedback deleted successfully.";
  } else {
    $deleteMessage = "Error deleting feedback.";
  }
}

// Fetch all feedback data (after possible deletion)
$feedbackData = $feedbackText->getAllFeedback($db);
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Include your custom CSS if needed -->
  <style>
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
        <div class="container mt-4">
          <h2 style="color:#0A0B4F;">Feedback Information</h2>

          <!-- Display success or error message -->
          <?php if (!empty($deleteMessage)) { ?>
            <div class="alert <?php echo $deleted ? 'alert-success' : 'alert-danger'; ?>" role="alert">
              <?php echo $deleteMessage; ?>
            </div>
          <?php } ?>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Feedback ID</th>
                  <th>Student Name</th>
                  <th>Subject</th>
                  <th>Feedback</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($feedbackData as $row) { ?>
                  <tr>
                    <td>
                      <?php echo $row['id']; ?>
                    </td>
                    <td>
                      <?php echo $row['name']; ?>
                    </td>
                    <td>
                      <?php echo $row['subject']; ?>
                    </td>
                    <td>
                      <?php echo $row['feedback']; ?>
                    </td>
                    <td>
                      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                        <input type="hidden" name="feedback_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" name="delete_feedback" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
                <!-- Add more table rows here -->
              </tbody>
            </table>
          </div>
        </div>
      </main>
      <!-- Include Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>