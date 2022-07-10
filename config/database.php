<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "Auth";


$conn = new mysqli($hostname, $username, $password, $database);

// check if there is a connection
if ($conn->connect_error) {
    die("There was a database connection error!");
}
