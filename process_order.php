<?php
session_start();

require_once('classes/DbConnector.php');

use classes\DbConnector;

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in the session
    $studentName = $_POST['StudentName'];
    $enrollmentNumber = $_POST['EnrollmentNumber'];
    $contactNumber = $_POST['contactNumber'];
    $sportKitID = $_POST['sportKitID'];
    $sportKitName = $_POST['sportKitName'];
    $selectedColor = $_POST['selectedColor'];
    $selectedSize = $_POST['selectedSize'];
    $quantity = $_POST['quantity'];

    // Connect to the database
    $db = DbConnector::getConnection();

    // Insert data into the database using prepared statements with placeholders
    $stmt = $db->prepare("INSERT INTO orders (user_id, student_name, enrollment_number, contact_number, sport_kit_id, sport_kit_name, selected_color, selected_size, quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind values to the prepared statement
    $stmt->bindValue(1, $user_id, PDO::PARAM_INT);
    $stmt->bindValue(2, $studentName, PDO::PARAM_STR);
    $stmt->bindValue(3, $enrollmentNumber, PDO::PARAM_STR);
    $stmt->bindValue(4, $contactNumber, PDO::PARAM_STR);
    $stmt->bindValue(5, $sportKitID, PDO::PARAM_INT);
    $stmt->bindValue(6, $sportKitName, PDO::PARAM_STR);
    $stmt->bindValue(7, $selectedColor, PDO::PARAM_STR);
    $stmt->bindValue(8, $selectedSize, PDO::PARAM_STR);
    $stmt->bindValue(9, $quantity, PDO::PARAM_INT);

     if ($stmt->execute()) {
        // Order successfully saved
        $_SESSION['order_success_message'] = "Order placed successfully!";
    } else {
        // Handle database insertion failure
        echo "Error placing order: " . $stmt->error;
    }

 $stmt->closeCursor();

    // Redirect to the sport kit page
    header("Location: sport_kit.php");
    exit();
} else {
    // If the form wasn't submitted, handle as needed
    // For instance:
    header("Location: sport_kit.php"); // Redirect to sport kit page
    exit();
}
?>
