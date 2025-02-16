<?php
session_start();
require_once 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = trim($_POST['product_name']);
    $category     = trim($_POST['category']);
    $price        = floatval($_POST['price']);
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image      = basename($_FILES['image']['name']);
        $image_tmp  = $_FILES['image']['tmp_name'];
        $target_dir = "../assets/images/";
        $image_path = $target_dir . $image;
        
        // (Optional) Validate file type/size here
        
        if (move_uploaded_file($image_tmp, $image_path)) {
            $stmt = $conn->prepare("INSERT INTO products (product_name, category, price, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $product_name, $category, $price, $image);
            
            if ($stmt->execute()) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Image upload failed!";
        }
    } else {
        echo "No image uploaded or upload error.";
    }
}
?>
