<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page
  header('Location: login.php');
  exit;
}

// Get the user's email from the session
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home Lobby</title>
</head>

<body>
  <h1>Welcome, <?php echo $email; ?>!</h1>
  <p>This is your home lobby page.</p>
  <p>You can add your content here.</p>
</body>

</html>
