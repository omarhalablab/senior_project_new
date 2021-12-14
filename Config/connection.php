<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "gamestore";
$con = mysqli_connect($server,$username,$password,$db_name);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}