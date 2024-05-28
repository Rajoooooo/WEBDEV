<?php
require('connect.php');
if(isset($_POST['submit']))
{
    $firstName=$_POST['firstName'];
    $lastName = $_POST ['lastName'];
    $email = $_POST ['email'];
    $password =$_POST['password'];
    $retypePassword = $_POST['retypePassword'];

$sql = "INSERT INTO signup_tb
VALUES('$firstName','$lastName','$email','$password','$retypePassword')";
    mysqli_query($con, $sql);
    echo
"
<script>alert('Data is inserted successfully');</script>
";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Website - Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>  
    
</head>
<body>
    <div class="container">
        <form action="" method="POST" name="form" onsubmit="return validateForm()">

            <h1>Join Our Healthcare Community</h1>
            <p>Fill out the form below to create your account:</p>
            <hr>

            <div class="input-box">
                <input type="text" name="firstName" placeholder="First Name">
            </div>

            <div class="input-box">
                <input type="text" name="lastName" placeholder="Last Name">
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email Address">
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Password">
            </div>

            <div class="input-box">
                <input type="password" name="retypePassword" placeholder="Confirm Password">
            </div>

            <div>
                <label>
                    <input type="checkbox">
                    I agree to the <a href="#">Terms and Conditions</a>
                </label>
            </div>

            <div>
                <button class="btnSignup" name ="submit" type="submit">Sign Up</button>
            </div>

            <div class="login">
                <p>Already have an account? <a href="Login.php">Sign In Here</a></p>
            </div>
        </form>
    </div>
</body>
</html>