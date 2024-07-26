<?php
require_once('classes/SportKit.php');

if (isset($_GET['kit_id'])) {
    $kit_id = $_GET['kit_id'];
    $isDeleted = \classes\SportKit::deleteSportKit($kit_id);
    if ($isDeleted) {
        // Redirect or display a success message
       header("Location: admin_sport_kit.php?deleteSuccess=1");
exit();
    } else {
        // Handle deletion failure
        header("Location: admin_sport_kit.php?success=0");
        exit();
    }
}
?>
