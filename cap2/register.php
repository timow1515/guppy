<?php
session_start();

// Handle the registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    // Perform necessary validation checks

    // Insert the user into the database
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'db_test';

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Check if the email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if ($result->num_rows > 0) {
        echo "Email already exists. Please use a different email address.";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, email, address, password) VALUES ('$firstname', '$lastname', '$email', '$address', '$hashedPassword')";
    if ($conn->query($sql) === true) {
        $_SESSION['username'] = $email;
        header('Location: index.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- Registration form -->
<form action="register.php" method="POST">
    <input type="text" name="firstname" placeholder="First Name" required><br>
    <input type="text" name="lastname" placeholder="Last Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="text" name="address" placeholder="Address" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" value="Register">
</form>
