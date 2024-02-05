<?php
 $DBHost = "localhost";
 $DBUser = "root";
 $DBPass = "";
 $DBName = "gym";

 $conn = mysqli_connect($DBHost, $DBUser, $DBPass, $DBName);

 if(!$conn){
    die("Connection Failed". mysqli_connect_error());
 } 
 echo "Connected";
 ?>