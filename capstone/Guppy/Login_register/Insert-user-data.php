<?php

// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$dbname = "user_inputs_reg";

// Establishing a connection to the Database
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieving the form data
$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Inserting the user data into the database
$sql = "INSERT INTO users (firstname, lastname, address,email ,contact_number, password) VALUES ('$firstname', '$lastname', '$address', '$email', '$contact_number', '$password')"; 

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Closing the database connection
mysqli_close($conn);

?>
