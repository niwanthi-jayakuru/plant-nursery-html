<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id   = intval($_POST['product_id']);
    $product_name = trim($_POST['product_name']);
    $category     = trim($_POST['category']);
    $price        = floatval($_POST['price']);
    
    $stmt = $conn->prepare("UPDATE products SET product_name = ?, category = ?, price = ? WHERE product_id = ?");
    $stmt->bind_param("ssdi", $product_name, $category, $price, $product_id);
    
    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
