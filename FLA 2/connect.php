<?php
$hostname='localhost';
$username='root';
$password = '';
$database = 'signup_db';
$con = mysqli_connect($hostname,$username,$password,$database);
if ($con)
{
    echo "Connection is successful";
}
else
{
    die(mysqli_error);
}
?>