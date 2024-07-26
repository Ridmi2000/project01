<?php
use classes\DbConnector;
use classes\User;

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'classes/User.php'; // Include the User class file
require_once 'classes/DbConnector.php';

$con = DbConnector::getConnection();

$user_id = $_SESSION['user_id'];
$user = User::getUserById($con, $user_id);

if ($user) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
        // Get updated data from the form
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $birthday = $_POST['birthday'];
        $nic = $_POST['nic'];
        $degree = $_POST['degree'];
        $faculty = $_POST['faculty'];
        $enrollment_no = $_POST['enrollment_no'];
        $phone_no = $_POST['phone_no'];
        $university_email = $_POST['university_email'];
        //$password = $_POST['password'];
        //$password = $_POST['confirm_password']; // Be sure to handle password securely
        $gender = $_POST['gender'];
        $sport_type = $_POST['sport_type'];
        $medical_issues = $_POST['medical_issues'];

        // Update user's profile data in the database
        // Here, you should perform appropriate validation, sanitation, and handle the password securely
        // For example, you may hash the password again and perform data validation
        // For simplicity, we're directly updating the data
        $query = "UPDATE university_students SET
            full_name = :full_name,
            address = :address,
            district = :district,
            birthday = :birthday,
            nic = :nic,
            degree = :degree,
            faculty = :faculty,
            enrollment_no = :enrollment_no,
            phone_no = :phone_no,
            university_email = :university_email,
            
            gender = :gender,
            sport_type = :sport_type,
            medical_issues = :medical_issues
            WHERE id = :user_id";

        $statement = $con->prepare($query);
        $statement->bindParam(':full_name', $full_name);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':district', $district);
        $statement->bindParam(':birthday', $birthday);
        $statement->bindParam(':nic', $nic);
        $statement->bindParam(':degree', $degree);
        $statement->bindParam(':faculty', $faculty);
        $statement->bindParam(':enrollment_no', $enrollment_no);
        $statement->bindParam(':phone_no', $phone_no);
        $statement->bindParam(':university_email', $university_email);
 
       // $hashed_password = password_hash($password, PASSWORD_BCRYPT);
       // $hashed_confirmPassword = password_hash($confirmPassword, PASSWORD_BCRYPT);
       // $statement->bindParam(':password', $hashed_password);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':sport_type', $sport_type);
        $statement->bindParam(':medical_issues', $medical_issues);
        $statement->bindParam(':user_id', $user_id);

        if ($statement->execute()) {
            // Profile updated successfully
            // You may also want to provide a success message to the user
            header("Location: profile.php?status=1");
           
            exit();
        } else {
            // Error updating the profile
            echo "Profile update failed.";
        }
    }

    // Display user profile information
    $full_name = $user['full_name'];
    $address = $user['address'];
    $district = $user['district'];
    $birthday = $user['birthday'];
    $nic = $user['nic'];
    $degree = $user['degree'];
    $faculty = $user['faculty'];
    $enrollment_no = $user['enrollment_no'];
    $phone_no = $user['phone_no'];
    $university_email = $user['university_email'];
   // $password = $user['password'];
   // $confirmPassword = $user['confirm_password'];
    $gender = $user['gender'];
    $sport_type = $user['sport_type'];
    $medical_issues = $user['medical_issues'];

    // Add HTML to display the profile details
    // You can format this as you wish
}
?>
