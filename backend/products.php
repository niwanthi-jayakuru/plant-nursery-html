<?php
// Include the database connection
include('db.php');

// Query to fetch all products
$query = "SELECT * FROM products";
$result = $conn->query($query);

// Check if there are results
if ($result->num_rows > 0) {
    $products = [];
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    // Send the products data as JSON response
    echo json_encode($products);
} else {
    echo json_encode(["message" => "No products found"]);
}

// Close the connection
$conn->close();
?>
