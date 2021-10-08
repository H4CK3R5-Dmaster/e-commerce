<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ecomm";
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$connect) {
    die("connection failed: ".mysqli_connect_error());
}


?>