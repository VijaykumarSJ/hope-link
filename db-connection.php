<?php

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hope_db";

// Database Connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>

