<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/assets/css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <title>Login</title>
</head>

<body>
  <div class="col-md-5 mx-auto mt-5 shadow border p-5">
    <form method="post" action="actions/login_db.php">
      <div class="form-group">
        <h4 class="h4">User Login</h4>
      </div>
      <div class="form-group mb-4">
        <label for="email">Email:</label>
        <input class="form-control" type="text" id="email" name="email" />
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
  </div>
</body>

</html>
