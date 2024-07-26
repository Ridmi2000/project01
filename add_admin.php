<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php"); // Redirect to the admin login page if not logged in
    exit();
}

use classes\DbConnector;
use classes\Admin;

require_once 'classes/DbConnector.php';
require_once 'classes/Admin.php';

$con = DbConnector::getConnection();

if (isset($_POST['addAdmin'])) {
    // Retrieve and sanitize admin data from the form
    $full_name = $_POST['full_name'];
    $university_email = $_POST['university_email'];
    $password = $_POST['password'];
    $sport_type = $_POST['sport_type'];
    $phone_no = $_POST['phone_no'];
    $is_team_captain = isset($_POST['is_team_captain']) ? 1 : 0;
    $address = $_POST['address'];
    $district = $_POST['district'];
    $birthday = $_POST['birthday'];
    $nic = $_POST['nic'];
    $degree = $_POST['degree'];
    $faculty = $_POST['faculty'];
    $enrollment_no = $_POST['enrollment_no'];
    $gender = $_POST['gender'];
    $medical_issues = $_POST['medical_issues'];
  
    // Create a new Admin object and add the admin to the database
    $admin = new Admin($full_name, $university_email, $password, $sport_type, $phone_no, $is_team_captain, $address, $district, $birthday, $nic, $degree, $faculty, $enrollment_no, $gender, $medical_issues);
    $admin->addAdmin($con);
    
    header("Location: admin_dashboard.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Admin</title>
    <style>
        .form-container {
            border: 2px solid darkblue;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            display: none;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;

        }

        .form-select {
            padding: 10px;
            /* Add padding to the select element */
            width: 100%;
            /* Set the width to 100% to expand it within its container */
        }
    </style>
</head>

<body>




    <!-- admin Form -->
    <div id="adminForm" class="form-container">
        <h3 style="color: darkblue;" class="mb-3">Create an account for admins!</h3>
        <div class="container mt-5">
            <div class="admin-Form">
                <form method="post" action="">

                
                    <div class="form-group">
                        <label for="fullName">Full Name:</label>
                        <input type="text" class="form-control" name="full_name" id="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="universityEmail">University Email:</label>
                        <input type="text" class="form-control" name="university_email" id="universityEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="sportType">Select Relevant Sport Type:</label>
                        <select class="form-control" name="sport_type" id="sportType" required>
                            <option value="">Select Sport Type</option>
                            <option value="football">Football</option>
                            <option value="basketball">Basketball</option>
                            <option value="tennis">Tennis</option>
                            <!-- Add more options if needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phoneNo">Phone No:</label>
                        <input type="text" class="form-control" name="phone_no" id="phoneNo" required>
                    </div>
                    <div class="form-group">
                        <label for="is_team_captain">Is Team Captain:</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_team_captain" class="form-check-input" id="is_team_captain"
                                value="1">
                            <label class="form-check-label" for="is_team_captain">Yes</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                    </div>
                    <div class="form-group">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" name="district" id="district" required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" class="form-control" name="birthday" id="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="nic">NIC:</label>
                        <input type="text" class="form-control" name="nic" id="nic" required>
                    </div>
                    <div class="form-group">
                        <label for="degree">Degree:</label>
                        <input type="text" class="form-control" name="degree" id="degree" required>
                    </div>
                    <div class="form-group">
                        <label for="faculty">Faculty:</label>
                        <input type="text" class="form-control" name="faculty" id="faculty" required>
                    </div>
                    <div class="form-group">
                        <label for="enrollmentNo">Enrollment No:</label>
                        <input type="text" class="form-control" name="enrollment_no" id="enrollmentNo" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female"
                                required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="medicalIssues">If having medical issues, mention:</label>
                        <textarea class="form-control" id="medicalIssues" name="medical_issues" rows="3"
                            required></textarea>
                    </div><br>
                    <button style="background-color: darkblue;" type="submit" class="btn btn-primary" name="addAdmin">Add Admin</button>



                </form>
            </div>
        </div>
    </div>
    <script>
        // JavaScript to toggle the visibility of the form
        document.addEventListener('DOMContentLoaded', function() {
            var adminForm = document.getElementById('adminForm');
            adminForm.style.display = 'block'; // Show the form
        });
    </script>
</body>

</html>