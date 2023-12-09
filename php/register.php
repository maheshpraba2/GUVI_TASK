<?php
// Include your database connection file (db.php) here
include 'php/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the AJAX request
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Add other fields as needed
    
    // Basic validation (you can add more validation as needed)
    if(empty($email) || empty($password)) {
        echo 'error';
        exit;
    }
    
    // Hash the password (use PHP's password_hash function)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Prepare and execute the query to insert user data into the database
    $stmt = $mysqli->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashedPassword);
    
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    // Close statement and database connection
    $stmt->close();
    $mysqli->close();
}
?>
