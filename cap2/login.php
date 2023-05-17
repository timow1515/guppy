<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Handle the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check username and password against the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_test';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
    } else {
        echo "Invalid username or password";
    }

    $conn->close();
}
?>

<!-- Login form -->
<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Login">
</form>
