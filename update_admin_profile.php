<?php
use classes\DbConnector;
use classes\Admin;

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'classes/Admin.php'; // Include the admin class file
require_once 'classes/DbConnector.php';

$con = DbConnector::getConnection();

$admin_id = $_SESSION['admin_id'];
$admin = Admin::getAdminById($con, $admin_id);

if ($admin) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
        // Get updated data from the form
        $full_name = $_POST['full_name'];
        $university_email = $_POST['university_email'];
        $sport_type = $_POST['sport_type'];
        $phone_no = $_POST['phone_no'];
        $is_team_captain = $_POST['is_team_captain'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $birthday = $_POST['birthday'];
        $nic = $_POST['nic'];
        $degree = $_POST['degree'];
        $faculty = $_POST['faculty'];
        $enrollment_no = $_POST['enrollment_no'];
        //$password = $_POST['password'];
        //$password = $_POST['confirm_password']; // Be sure to handle password securely
        $gender = $_POST['gender'];
        $medical_issues = $_POST['medical_issues'];

        // Update user's profile data in the database
        // Here, you should perform appropriate validation, sanitation, and handle the password securely
        // For example, you may hash the password again and perform data validation
        // For simplicity, we're directly updating the data
        $query = "UPDATE admin SET
            full_name = :full_name,
            university_email = :university_email,
            sport_type = :sport_type,
            phone_no = :phone_no,
            is_team_captain = :is_team_captain,
            address = :address,
            district = :district,
            birthday = :birthday,
            nic = :nic,
            degree = :degree,
            faculty = :faculty,
            enrollment_no = :enrollment_no,
            gender = :gender,
            medical_issues = :medical_issues
            WHERE id = :admin_id";

        $statement = $con->prepare($query);
        $statement->bindParam(':full_name', $full_name);
        $statement->bindParam(':university_email', $university_email);
        $statement->bindParam(':sport_type', $sport_type);
        $statement->bindParam(':phone_no', $phone_no);
        $statement->bindParam(':is_team_captain', $is_team_captain);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':district', $district);
        $statement->bindParam(':birthday', $birthday);
        $statement->bindParam(':nic', $nic);
        $statement->bindParam(':degree', $degree);
        $statement->bindParam(':faculty', $faculty);
        $statement->bindParam(':enrollment_no', $enrollment_no);
       // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
       // $hashed_confirmPassword = password_hash($confirmPassword, PASSWORD_BCRYPT);
       // $statement->bindParam(':password', $hashed_password);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':medical_issues', $medical_issues);
        $statement->bindParam(':admin_id', $admin_id);

        if ($statement->execute()) {
            // Profile updated successfully
            // You may also want to provide a success message to the user
            header("Location: admin_profile.php?status=1");
           
            exit();
        } else {
            // Error updating the profile
            echo "Profile update failed.";
        }
    }

    // Display admin profile information
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
}
?>
