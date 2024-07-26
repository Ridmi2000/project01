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