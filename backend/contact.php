<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all fields.";
        exit();
    }

    $to      = "admin@cactusworld.com";
    $subject = "New Message from Contact Form";
    $body    = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us! We'll get back to you shortly.";
    } else {
        echo "There was an error sending your message. Please try again.";
    }
}
?>
