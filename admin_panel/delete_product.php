<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_panel"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Delete product
    $sql = "DELETE FROM product WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $response = ['success' => true];
    } else {
        $response = [
            'success' => false,
            'message' => "Error: " . $stmt->error
        ];
    }
    $stmt->close();
} else {
    $response = [
        'success' => false,
        'message' => "Invalid product ID"
    ];
}

echo json_encode($response);

$conn->close();
?>
