<?php
// MongoDB connection setup
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('your_database_name'); // Replace 'your_database_name' with your actual database name
$collection = $database->selectCollection('your_collection_name'); // Replace 'your_collection_name' with your actual collection name

// Assuming you have a unique identifier for users (e.g., email)
$userEmail = $_SESSION['email']; // Assuming the email is stored in the session after login

// Query to find user profile based on email (or other unique identifier)
$userProfile = $collection->findOne(['email' => $userEmail]);

// Return user profile as JSON response
header('Content-Type: application/json');
echo json_encode($userProfile);
?>
