<?php

// Replace these values with your actual database information
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "mydatabase";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the user data from the HTML form
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$address = $_POST["address"];
$contact_number = $_POST["contact_number"];
$email = $_POST["email"];
$password = $_POST["password"];

// Insert the user data into the database
$sql = "INSERT INTO users (firstname, lastname, address, contact_number, email, password) VALUES ('$firstname', '$lastname', '$address', '$contact_number', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);

?>