<?php
$hostname = "185.213.81.1";
$username = "u960900126_saproducciones";
$password = "Cocorilow.1";
$dbname = "u960900126_hondabd";

   

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
  echo "Database connection, estamos en este error ..... " . mysqli_connect_error();
}else{echo "conectado <br>";}