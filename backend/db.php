<?php
// Database connection details
define('DB_SERVER', 'localhost');  // MySQL server
define('DB_USERNAME', 'root');     // MySQL username
define('DB_PASSWORD', '');         // MySQL password
define('DB_NAME', 'cactus_world'); // Your database name

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
