<?php
// Include the database connection
include('db.php');

// Query to fetch all categories
$query = "SELECT * FROM categories";
$result = $conn->query($query);

// Check if there are results
if ($result->num_rows > 0) {
    $categories = [];
    while($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    // Send the categories data as JSON response
    echo json_encode($categories);
} else {
    echo json_encode(["message" => "No categories found"]);
}

// Close the connection
$conn->close();
?>
