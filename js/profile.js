$(document).ready(function() {
    // Function to fetch user profile information
    function fetchUserProfile() {
        $.ajax({
            type: 'GET',
            url: 'profile.php', // Replace with the endpoint to fetch user profile data
            success: function(response) {
                // Process the response and populate the profile fields
                // For example:
                $('#age').val(response.age);
                $('#dob').val(response.dob);
                $('#contact').val(response.contact);
                // Update other profile fields accordingly
            },
            error: function() {
                // Handle AJAX errors
                console.log('Error fetching user profile.');
            }
        });
    }

    // Fetch user profile on page load
    fetchUserProfile();

    // Function to update user profile information
    $('#updateProfileForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get updated profile values
        var age = $('#age').val().trim();
        var dob = $('#dob').val().trim();
        var contact = $('#contact').val().trim();
        // Add other fields as needed
        
        // AJAX request to update profile information
        $.ajax({
            type: 'POST',
            url: 'update_profile.php', // Replace with the endpoint to update profile data
            data: {
                age: age,
                dob: dob,
                contact: contact
                // Include other fields here
            },
            success: function(response) {
                if(response === 'success') {
                    // Show success message or perform any other action
                    console.log('Profile updated successfully.');
                } else {
                    // Display error message for update failure
                    console.log('Failed to update profile.');
                }
            },
            error: function() {
                // Handle AJAX errors
                console.log('Error updating profile.');
            }
        });
    });
});
