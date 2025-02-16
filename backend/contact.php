<?php
// Include the database connection
include('db.php');

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and capture form inputs
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert into the database
    $query = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($query) === TRUE) {
        echo "Message submitted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
