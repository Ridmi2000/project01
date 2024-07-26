<?php

require_once('Class/Events.php');

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id']; // Fix the variable name here
    $events = new Events(); // Create an instance of the Events class
    $isDeleted = $events->deleteEvent($event_id); // Call the method on the instance
    
    if ($isDeleted) {
        // Redirect or display a success message
        header("Location: admin_event.php?deleteSuccess=1");
        exit();
    } else {
        // Handle deletion failure
        header("Location: admin_event.php?success=0");
        exit();
    }
}
?>