<?php
$serever = "localhost";
$username = "root";
$password = "";
$database = "care";
$conn = mysqli_connect($serever,$username,$password,$database);
if(!$conn){
    die("Error". mysqli_connect_error());
    }
?>
