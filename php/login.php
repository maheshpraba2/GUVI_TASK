<?php
// Include your database connection file (db.php) here
include 'php/db.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the AJAX request
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize user input if required

    // Prepare and execute the query to check user credentials
    $stmt = $mysqli->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Bind the result variables
    $stmt->bind_result($dbEmail, $dbPassword);
    $stmt->fetch();

    // Verify password and create session
    if ($stmt->num_rows > 0 && password_verify($password, $dbPassword)) {
        // Set authentication success message and send it to the AJAX success callback
        echo 'success';
        // Start or resume session here if required
        // Example: session_start();
        // Example: $_SESSION['email'] = $email;
    } else {
        // Send an error message to the AJAX error callback
        echo 'error';
    }

    // Close statement and database connection
    $stmt->close();
    $mysqli->close();
}
?>
