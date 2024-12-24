<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error); // Log error
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id = isset($_POST['id']) ? $_POST['id'] : '';
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';
$product_price = isset($_POST['product_price']) ? $_POST['product_price'] : '';
$product_color = isset($_POST['product_color']) ? $_POST['product_color'] : '';
$product_inventory = isset($_POST['product_inventory']) ? $_POST['product_inventory'] : '';
$product_rating = isset($_POST['product_rating']) ? $_POST['product_rating'] : '';
$product_image_url = isset($_POST['product_image_url']) ? $_POST['product_image_url'] : '';

// Check if it's an edit or add operation
if ($id) {
    // Update existing product
    $sql = "UPDATE product SET product_name=?, product_price=?, product_color=?, inventory=?, product_rating=?, product_image_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $product_name, $product_price, $product_color, $product_inventory, $product_rating, $product_image_url, $id);
} else {
    // Add new product
    $sql = "INSERT INTO product (product_name, product_price, product_color, inventory, product_rating, product_image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $product_name, $product_price, $product_color, $product_inventory, $product_rating, $product_image_url);
}

if ($stmt->execute()) {
    if ($id) {
        $product_id = $id;
    } else {
        $product_id = $stmt->insert_id;
    }
    $response = [
        'success' => true,
        'product' => [
            'id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_color' => $product_color,
            'inventory' => $product_inventory,
            'product_rating' => $product_rating,
            'product_image_url' => $product_image_url,
        ]
    ];
    echo json_encode($response);
} else {
    error_log("Error: " . $stmt->error); // Log error
    $response = [
        'success' => false,
        'message' => "Error: " . $stmt->error
    ];
    echo json_encode($response);
}

$stmt->close();
$conn->close();
?>
