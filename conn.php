<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "bookg";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn){
    die( "Connection Failed");
}
?>