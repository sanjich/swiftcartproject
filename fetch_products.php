<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error); // Log error
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products from the database
$sql = "SELECT id, product_name, product_image_url, product_price, product_color, inventory, product_rating FROM product";
$result = $conn->query($sql);

$product = [];

if ($result === false) {
    error_log("Error executing query: " . $conn->error); // Log error
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($product);

// Close connection
$conn->close();
?>