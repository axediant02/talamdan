<?php
// $servername = "talamdan.cctcccs.com";
// $username = "u654466566_talamdan";
// $password = "Talamdangroup3";
// $database = "u654466566_talamdan";

$servername = "localhost";
$username = "root";
$password = "";
$database = "u654466566_talamdan";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully";
}