<?php
session_start();
require_once 'db.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = trim($_POST['product_name']);
    $category     = trim($_POST['category']);
    $price        = floatval($_POST['price']);
    
    $image        = basename($_FILES['image']['name']);
    $image_tmp    = $_FILES['image']['tmp_name'];
    $target_dir   = "../assets/images/";
    $image_path   = $target_dir . $image;

    // Upload image
    if (move_uploaded_file($image_tmp, $image_path)) {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO products (product_name, category, price, image) VALUES (?, ?, ?, ?)");
        
        // Check if prepare() failed
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        
        // Bind parameters: 'ssds' -> string, string, double, string
        $stmt->bind_param("ssds", $product_name, $category, $price, $image);

        // Execute and check for errors
        if ($stmt->execute()) {
            echo "Product added successfully!";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Image upload failed!";
    }
}
?>
