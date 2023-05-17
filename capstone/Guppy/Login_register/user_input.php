<?php

// Replace these values with your actual database credentials
$host = 'localhost';
$dbname = 'guppy-user-inputs';
$user = 'root';
$password = '';

// Create a PDO instance representing a connection to the database
try {
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Error: Could not connect. " . $e->getMessage());
}

// Get the user input from the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$password = $_POST['password'];

// Insert the user input into the database
$sql = "INSERT INTO users (firstname, lastname, address, email, contact_number, password) VALUES (:firstname, :lastname, :address, :email, :contact_number, :password)";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':contact_number', $contact_number);
$stmt->bindParam(':password', $password);
$stmt->execute();

// Check for errors inserting the data
if ($stmt === false) {
  die("Error: Could not insert data. " . mysqli_error($dbh));
}

// Close the database connection
$dbh = null;

?>
