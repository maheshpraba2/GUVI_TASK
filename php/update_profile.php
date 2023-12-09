<?php
// MongoDB connection setup
$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$database = $mongoClient->selectDatabase('your_database_name'); // Replace 'your_database_name' with your actual database name
$collection = $database->selectCollection('your_collection_name'); // Replace 'your_collection_name' with your actual collection name

// Assuming you have a unique identifier for users (e.g., email)
$userEmail = $_SESSION['email']; // Assuming the email is stored in the session after login

// Get updated profile data from POST request
$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
// Add other fields as needed

// Update user profile in MongoDB based on the unique identifier
$updateResult = $collection->updateOne(
    ['email' => $userEmail],
    ['$set' => [
        'age' => $age,
        'dob' => $dob,
        'contact' => $contact
        // Update other fields accordingly
    ]]
);

if ($updateResult->getModifiedCount() > 0) {
    echo 'success'; // Return success message if the profile was updated
} else {
    echo 'error'; // Return error message if the profile update failed
}
?>
