<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // NOTE: For production, use password hashing and secure practices!
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ../admin/dashboard.html');
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header('Location: ../login.html');
    }
    $stmt->close();
}
?>
