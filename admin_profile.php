<?php
$message = null;
if (isset($_GET["status"])) {
    $status = $_GET["status"];
    if ($status == 1) {
        $message = "<h6 class='text-success'>You have successfully updated with admin profile.</h6>";
    } else {
        $message = "<h6 class='text-danger'>An error occurred during updating the profile. Please try again later.</h6>";
    }
}

?>


<?php
use classes\DbConnector;
use classes\Admin;

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'classes/Admin.php'; // Include the Admin class file
require_once 'classes/DbConnector.php';

$con = DbConnector::getConnection();

$admin_id = $_SESSION['admin_id'];
$admin = Admin::getAdminById($con, $admin_id);

if ($admin) {
    // Display user profile information
    $full_name = $admin['full_name'];
    $university_email = $admin['university_email'];
    $sport_type = $admin['sport_type'];
    $phone_no = $admin['phone_no'];
    $is_team_captain = $admin['is_team_captain'];
    $address = $admin['address'];
    $district = $admin['district'];
    $birthday = $admin['birthday'];
    $nic = $admin['nic'];
    $degree = $admin['degree'];
    $faculty = $admin['faculty'];
    $enrollment_no = $admin['enrollment_no'];
    $gender = $admin['gender'];
    $medical_issues = $admin['medical_issues'];

    // Add HTML to display the profile details
    // You can format this as you wish
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Profile</title>
    <style>
        .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            background-color: white;
            color: black !important;
        }

        .navbar {
            background-color: #0A0B4F;
        }

        .profile-container {
            border: 2px solid darkblue;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>

    <!-- Profile Container -->
    <div class="profile-container">
        <h3 style="color: darkblue;" class="mb-3">Admin Profile</h3>
        <div class="container mt-5">
            <div class="profile-form">
                <form action="update_admin_profile.php" method="post">
                <?php echo $message; ?>
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" class="form-control" name="full_name" id="fullName"
                            value="<?php echo $full_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="universityEmail">University Email:</label>
                        <input type="text" class="form-control" name="university_email" id="universityEmail"
                            value="<?php echo $university_email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="sportType">Sport Type:</label>
                        <input type="text" class="form-control" name="sport_type" id="sportType"
                            value="<?php echo $sport_type; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phoneNo">Phone No:</label>
                        <input type="text" class="form-control" name="phone_no" id="phoneNo"
                            value="<?php echo $phone_no; ?>">
                    </div>
                    <div class="form-group">
                        <label for="phoneNo">Is Team Captain:</label>
                        <input type="text" class="form-control" name="is_team_captain" id="isTeamCaptain"
                            value="<?php echo $is_team_captain; ?>">
                    </div>
                   
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" id="address"
                            value="<?php echo $address; ?>">
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" name="district" id="district"
                            value="<?php echo $district; ?>">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" class="form-control" name="birthday" id="birthday"
                            value="<?php echo $birthday; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nic">NIC:</label>
                        <input type="text" class="form-control" name="nic" id="nic" value="<?php echo $nic; ?>">
                    </div>
                    <div class="form-group">
                        <label for="degree">Degree:</label>
                        <input type="text" class="form-control" name="degree" id="degree"
                            value="<?php echo $degree; ?>">
                    </div>
                    <div class="form-group">
                        <label for="faculty">Faculty:</label>
                        <input type="text" class="form-control" name="faculty" id="faculty"
                            value="<?php echo $faculty; ?>">
                    </div>
                    <div class="form-group">
                        <label for="enrollmentNo">Enrollment No:</label>
                        <input type="text" class="form-control" name="enrollment_no" id="enrollmentNo"
                            value="<?php echo $enrollment_no; ?>">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" name="gender" id="gender"
                            value="<?php echo $gender; ?>">
                    </div>
                    <div class="form-group">
                        <label for="medicalIssues">Medical Issues:</label>
                        <textarea class="form-control" id="medicalIssues" name="medical_issues"
                            rows="3"><?php echo $medical_issues; ?></textarea>
                    </div>
                    <input type="hidden" name="updateProfile" value="1">
                    <button style="background-color: darkblue" type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#confirmationModal">Update Profile</button>

                        <a href="logout.php" class="btn btn-danger">Logout</a>

                </form>

            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update your profile?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmUpdateBtn">Yes, Update</button>
                </div>
            </div>
        </div>
    </div>

    <footer style="background-color: #0A0B4F;" class=" text-white text-center py-3">
        <p>&copy; 2023 UWU Sports Council. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // This function will handle the form submission when the user confirms the update
        document.getElementById('confirmUpdateBtn').addEventListener('click', function () {
            document.querySelector('form').submit(); // Submit the form
        });
    </script>

  

</body>

</html>