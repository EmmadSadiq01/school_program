<?php
$server =  "localhost";
$username = "root";
$password = "";
$database = "school_program";
$database_error = false;

$connection = mysqli_connect($server, $username, $password, $database);
if (!$connection) {
    $database_error = true;
}
?>

