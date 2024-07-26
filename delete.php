<?php 

include("DbConnector.php");

if(isset($_POST["id"])){
    $id = $_POST["id"];


$sql = "DELETE FROM user WHERE id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {

    echo 1;
   




}
}

?>