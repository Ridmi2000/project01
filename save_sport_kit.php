<?php
namespace classes;

require_once('classes/DbConnector.php');
require_once('classes/SportKit.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sportName = $_POST['sportName'];
    $availableColors = $_POST['availableColors']; // Modified for the change in form
    $availableSizes = $_POST['availableSizes'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    // Add your image upload handling code here if required
    // Move the uploaded image to a specific location or handle it based on your needs
    // Example: move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $_FILES['image']['name']);

    $added = SportKit::addSportKit($sportName, $availableColors, $availableSizes, $price, $description, $image);

    if ($added) {
        header("Location: admin_sport_kit.php?success=1");
        exit();
    } else {
        header("Location: admin_sport_kit.php?success=0");
        exit();
    }
}
?>





