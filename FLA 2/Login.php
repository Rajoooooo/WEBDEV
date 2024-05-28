<?php
session_start();

require('connect.php'); // Include database connection file

$message = ""; // Initialize an empty message variable

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check if the email and password match
    $query = "SELECT * FROM signup_tb WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) > 0) {
        // User is authenticated
        $_SESSION['email'] = $email; // Store user's email in session
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        // Set the message for incorrect credentials
        $message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php 
        // Display the message if it's not empty
        if (!empty($message)) {
            echo "<p style='color: red;'>$message</p>";
        }
        ?>
        <form method="POST" action="" onsubmit="return validateForm()">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="signup-link">
            Don't have an account yet? <a href="signup.php">Sign up here</a>
        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // You can add more complex validation if needed
            if (email === '' || password === '') {
                alert('Please enter both email and password');
                return false; // Prevent form submission
            }
            // If all validations pass, allow the form to submit
            return true;
        }
    </script>
</body>
</html>
