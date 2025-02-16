<?php
$servername = "localhost";
$username   = "root";            // Your MySQL username
$password   = "";                // Your MySQL password
$dbname     = "cactus_world";    // Your database name
$port       = 3307;              // Specify the custom port number

// Create connection, including the port number
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection BEFORE setting charset
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to utf8
$conn->set_charset("utf8");
?>
