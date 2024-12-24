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
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Check credentials
$sql = "SELECT * FROM adminuser WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    error_log("Error executing query: " . $stmt->error); // Log error
    die("Error executing query: " . $stmt->error);
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Start session and set session variables
        session_start();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        $response = ['success' => true];
    } else {
        $response = ['success' => false, 'message' => 'Invalid password.'];
    }
} else {
    $response = ['success' => false, 'message' => 'No user found with that username.'];
}

echo json_encode($response);

$stmt->close();
$conn->close();
?>
