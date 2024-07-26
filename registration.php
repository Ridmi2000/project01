<?php

use classes\DbConnector;
use classes\User;

require 'classes/DbConnector.php'; // Adjust the path to your DbConnector class file
require 'classes/User.php'; // Adjust the path to your User class file

if (isset($_POST["submit"])) {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $address = $_POST["address"];
    $district = $_POST["district"];
    $birthday = $_POST["birthday"];
    $nic = $_POST["nic"];
    $degree = $_POST["degree"];
    $faculty = $_POST["faculty"];
    $enrollment_no = $_POST["enrollment_no"];
    $phone_no = $_POST["phone_no"];
    $university_email = $_POST["university_email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $sport_type = $_POST["sport_type"];
    $medical_issues = $_POST["medical_issues"];

    // Additional validation checks
    if (empty($full_name) || empty($address) || empty($district) || empty($birthday) || empty($nic) || empty($degree) || empty($faculty) || empty($enrollment_no) || empty($phone_no) || empty($university_email) || empty($password) || empty($confirmPassword) || empty($gender) || empty($sport_type) || empty($medical_issues)) {
        header("Location: signin.php?status=1"); // Missing required fields
        exit();
    }

    $birthday_timestamp = strtotime($birthday);
    if ($birthday_timestamp === false || $birthday_timestamp > time()) {
        header("Location: signin.php?status=7"); // Future birthday or invalid date
        exit();
    }

    if (strlen($password) < 8) {
        header("Location: signin.php?status=4"); // Password too short
        exit();
    }

    if ($password !== $confirmPassword) {
        header("Location: signin.php?status=6"); // Passwords do not match
        exit();
    }

    if (!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/\d/", $password) || !preg_match("/[^A-Za-z0-9]/", $password)) {
        header("Location: signin.php?status=5"); // Password complexity requirements not met
        exit();
    }

    $db = DbConnector::getConnection();
    $user = new User($full_name, $address, $district, $birthday, $nic, $degree, $faculty, $enrollment_no, $phone_no, $university_email, $password, $confirmPassword, $gender, $sport_type, $medical_issues);

    if ($user->register($db)) {
        $db = null; // Close the database connection
        header("Location: signin.php?status=2"); // Successful registration
        exit();
    } else {
        $db = null; // Close the database connection
        header("Location: signin.php?status=3"); // Registration failed
        exit();
    }
} else {
    header("Location: signin.php?status=0"); // No form submission
    exit();
}
