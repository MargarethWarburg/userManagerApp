<?php

$servername = "localhost";
$username = "root";
$password = " ";
$database = "user_management";

//create connection
$conn= new mysqli("localhost","root","","user_management");

//check connection
if($conn->connect_error){
  die("connection failed:" . $conn->connect_error);
}

//echo "connection successfully.<br>";

?>