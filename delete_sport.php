<?php
require_once 'sport1.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sportObj = new sport1();

    // Attempt to delete the sport
    if ($sportObj->deleteSport($id)) {
        echo "Sport deleted successfully. <a href='list_sports.php'>Go back to list</a>";
    } else {
        echo "Failed to delete sport.";
    }

    // Close the database connection
    $sportObj->closeDBConnection();
} else {
    echo "Invalid request.";
}
?>

