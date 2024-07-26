<?php
include("connection.php");

if (isset($_POST["check_update"])) {
    $id = $_POST["id"];
    $time = $_POST["time"];
    $monday = $_POST["monday"];
    $tuesday = $_POST["tuesday"];
    $wednesday = $_POST["wednesday"];
    $thursday = $_POST["thursday"];
    $friday = $_POST["friday"];
    $saturday = $_POST["saturday"];
    $sunday = $_POST["sunday"];

    // Check if any field is empty
    if (empty($time) || empty($monday) || empty($tuesday) || empty($wednesday) || empty($thursday) || empty($friday) || empty($saturday) || empty($sunday)) {
        echo "Please fill in all fields";
    } else {
        $sql = "UPDATE volleyball SET time='$time',monday='$monday',tuesday='$tuesday',wednesday='$wednesday',thursday='$thursday',friday='$friday',saturday='$saturday',sunday='$sunday' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 1;
        } else {
            echo 2;
        }
    }
}
?>

