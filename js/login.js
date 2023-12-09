$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get input values
        var email = $('#email').val().trim();
        var password = $('#password').val().trim();
        
        // Basic validation
        if(email === '' || password === '') {
            // Show error message for empty fields
            $('#error').text('Please fill in all fields.');
            return;
        }
        
        // AJAX request to login.php for authentication
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if(response === 'success') {
                    // Redirect to profile page upon successful login
                    window.location.href = 'profile.php';
                } else {
                    // Display error message for invalid credentials
                    $('#error').text('Invalid email or password. Please try again.');
                }
            },
            error: function() {
                // Handle AJAX errors
                $('#error').text('An error occurred. Please try again later.');
            }
        });
    });
});
