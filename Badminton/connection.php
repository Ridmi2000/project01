<?php
 
 $host = "localhost";
 $user = "root";
 $pass = "";
 $db = "mydb";

 $conn = mysqli_connect($host, $user, $pass, $db);

 if(!$conn){
    die("not connect". mysqli_connect_error());
 }


?>