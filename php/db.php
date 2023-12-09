<?php
// MySQL database credentials
$host = "localhost"; // Your MySQL host
$dbname = "your_database_name"; // Your database name
$username = "your_username"; // Your database username
$password = "your_password"; // Your database password

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare a statement for later use with prepared statements
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");

    // Other database-related operations and functions can be added here

} catch(PDOException $e) {
    // Display error message on connection failure
    die("Connection failed: " . $e->getMessage());
}
?>
