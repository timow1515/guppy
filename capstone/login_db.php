<?php
session_start();
require_once('db.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM register WHERE email='$email' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $_SESSION['email'] = $email;
    header("location: index.php");
  } else {
    header("location: login.php?error=Invalid Login Credentials");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="public/assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <title>Login</title>
</head>

<body>
  <?php
  if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger'>" . $_GET['error'] . "</div>";
  }
  ?>
  <div class="col-md-5 mx-auto mt-5 shadow border p-5">
    <form method="post" action="">
      <div class="form-group">
        <h4 class="h4">User Login</h4>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input class="form-control mb-2" type="text" id="email" name="email" />
      </div>
      <div class="form-group mb-5">
        <label for="password">Password:</label>
        <input class="form-control" type="password" id="password" name="password" />
      </div>
      <div class="form-group">
        <div class="row mx-auto">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>
    </form>
    <?php
      if (isset($_SESSION['email'])) {
        echo "You are logged in as ".$_SESSION['email'];
      }
    ?>
  </div>
</body>

</html>
