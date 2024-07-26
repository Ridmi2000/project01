<?php 
include("connection.php");

if(isset($_POST["id"])){
$id=$_POST["id"];

$sql = "SELECT * FROM volleyball WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

echo json_encode($row);

}


?>