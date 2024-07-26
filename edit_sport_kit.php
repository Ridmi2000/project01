<?php
use classes\DbConnector;
use classes\SportKit;

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require_once 'classes/SportKit.php';
require_once 'classes/DbConnector.php';

$con = DbConnector::getConnection();

// Assuming you have a method in the SportKit class to retrieve a single kit by ID
if (isset($_GET['editKitId'])) {
    $kit_id = $_GET['editKitId'];
    $kit = SportKit::getSportKitById($con, $kit_id);

    if ($kit) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateSportKit'])) {
            // Get updated data from the form
            $sportName = $_POST['sportName'];
            $availableColors = $_POST['availableColors'];
            $availableSizes = $_POST['availableSizes'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            // Process the rest of the form fields

            // Update the sport kit data in the database
            $query = "UPDATE sport_kits SET
                sportName = :sportName,
                availableColors = :availableColors,
                availableSizes = :availableSizes,
                price = :price,
                description = :description
                WHERE id = :kit_id";

            $statement = $con->prepare($query);
            $statement->bindParam(':sportName', $sportName);
            $statement->bindParam(':availableColors', $availableColors);
            $statement->bindParam(':availableSizes', $availableSizes);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':description', $description);
            $statement->bindParam(':kit_id', $kit_id);

            if ($statement->execute()) {
                // Kit updated successfully
                header("Location: sport_kits.php");
                exit();
            } else {
                // Error updating the kit
                echo "Sport kit update failed.";
            }
        }

        // Display sport kit information in the edit form
        $sportName = $kit['sportName'];
        $availableColors = $kit['availableColors'];
        $availableSizes = $kit['availableSizes'];
        $price = $kit['price'];
        $description = $kit['description'];

        // Add HTML to display the edit sport kit form
        // You can format this as you wish
    } else {
        // Invalid kit ID or kit not found
        echo "Sport kit not found.";
    }
}
?>
