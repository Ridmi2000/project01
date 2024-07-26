<?php
// update_sport_kit.php

if (isset($_POST['editSportKit'])) {
    // Retrieve edited details from the form
    $editedKitId = $_POST['editKitId'];
    $editedSportName = $_POST['sportName'];
    $editedAvailableColors = $_POST['availableColors'];
    // ... retrieve other fields

    // Perform the necessary update operation in your database using the SportKit class method
    // Example:
    // $db = new \classes\DbConnector(); // Assuming you have a DbConnector class
    // $sportKit = new \classes\SportKit($db);
    // $sportKit->updateSportKit($editedKitId, $editedSportName, $editedAvailableColors, ...);

    // Redirect or perform any necessary actions after the update
    header("Location: admin_sport_kit.php"); // Redirect to the desired page after updating
    exit();
}
?>
