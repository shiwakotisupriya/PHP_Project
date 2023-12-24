<div class="login-container">
        <h2 class="form-heading">Login Page</h2>
        <h4 class="invalid"><?=$pass?></h4>
        <form class="login-form" method="POST">
            <label for="email">Email:</label><br>
            <input type="email" name="email" required>
            <br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" required>
            <br>
            <br>
            <input type="submit" name="login" value="Login">
        </form>
        <h3 class="login-h3">Dont have account?<a href="signup.php">Signup</a></h3>
        
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $("#loginForm").submit(function (event) {
            event.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();

            $.ajax({
                type: "POST",
                url: "login.php",
                data: {
                    login: 1,
                    email: email,
                    password: password
                },
                success: function (response) {
                    window.location.href = "dashboard.php";
                },
                error: function (error) {
                    console.error(error.responseText);
                }
            });
        });
    });
</script>
