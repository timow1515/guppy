<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Display welcome message and user's information
echo "Welcome, " . $_SESSION["firstname"] . " " . $_SESSION["lastname"] . "!<br>";
echo "Your contact number is: " . $_SESSION["contact_number"] . "<br>";
echo "Your email is: " . $_SESSION["email"] . "<br>";

// Logout button
echo "<a href='logout.php'>Logout</a>";
?>
