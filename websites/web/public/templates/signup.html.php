<?php
session_start();

// ... (Your existing code)

// Display the success or failure message if it exists
if (isset($_SESSION['signup_message'])) {
    echo '<div id="message-container"><p>' . $_SESSION['signup_message'] . '</p></div>';
    unset($_SESSION['signup_message']); // Clear the session variable
}
?>
<div class="login-container">
        <h2 class="form-heading">Signup Page</h2>
<form id="signupForm" action="#" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required>

        <br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required>

        <br>
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob" required>

        <br>
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required>

        <br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required>
        <br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required>

        <br>
        <input type="submit"  name ="submit"value="Sign Up">
    </form>
        
</div>


<script>
$(document).ready(function() {
    $('#signupForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                var result = $.parseJSON(response);
                $('#message-container').html('<p>' + result.message + '</p>');
            },
            error: function() {
                $('#message-container').html('<p>Error submitting the form</p>');
            }
        });
    });
});
</script>
