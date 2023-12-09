$(document).ready(function() {
    $('#registerForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get input values
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        // Add other fields as needed
        
        // Basic validation
        if(email === '' || password === '') {
            // Show error message for empty fields
            $('#error').text('Please fill in all fields.');
            return;
        }
        
        // AJAX request to register.php for registration
        $.ajax({
            type: 'POST',
            url: 'register.php',
            data: {
                email: email,
                password: password
                // Include other fields here
            },
            success: function(response) {
                if(response === 'success') {
                    // Redirect to login page upon successful registration
                    window.location.href = 'login.html';
                } else {
                    // Display error message for registration failure
                    $('#error').text('Registration failed. Please try again.');
                }
            },
            error: function() {
                // Handle AJAX errors
                $('#error').text('An error occurred. Please try again later.');
            }
        });
    });
});
