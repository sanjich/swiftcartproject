<?php
// Include database connection
include('db_connect.php'); // Replace with your connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    $sql = "INSERT INTO customer (user_name, email, phone, password) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_name, $email, $phone, $password);

    if ($stmt->execute()) {
        echo "Sign-up successful!";
        header("Location: ../loginPage.html"); // Redirect to login page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
