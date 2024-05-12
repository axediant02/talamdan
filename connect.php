<?php

$host = "talamdan.cctcccs.com";                 
$dbname = "u654466566_talamdan";        // Database name
$username = "u654466566_talamdan";    // Database username
$password = "Talamdangroup3";   // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected to database";
}
