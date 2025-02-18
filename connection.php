<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "login_db";


error_reporting(E_ALL);
ini_set('display_errors', 1);


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// else {
//     echo "Connected successfully";
// }
?>