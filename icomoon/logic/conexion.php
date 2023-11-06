<?php

//Db local
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "inigmai";

   

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection, estamos en este error ..... " . mysqli_connect_error();
}else{ }