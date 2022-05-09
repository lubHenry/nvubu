<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nvubu - Register</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/img/hipologin.jpeg" alt="login" class="login-card-img">
          </div>
            <?php
                require('db.php');
                global $con;
            // If form submitted, insert values into the database.
                if (isset($_REQUEST['name'])){
                    // removes backslashes
                    $fullname = stripslashes($_REQUEST['name']);
                    //escapes special characters in a string
                    $fullname = mysqli_real_escape_string($con,$fullname);
                    $email = stripslashes($_REQUEST['email']);
                    $email = mysqli_real_escape_string($con,$email);
                    $password = stripslashes($_REQUEST['password']);
                    $password = mysqli_real_escape_string($con,$password);
                    $join_date = date("Y-m-d H:i:s");
                    $query = "INSERT into `users` (fullname, email, password, join_date)
                        VALUES ('$fullname', '$email', '".md5($password)."', '$join_date')";
                    $result = mysqli_query($con,$query);
                    if($result){
                        echo "<div class='form'>
                        <h3>You are registered successfully.</h3>
                        <br/>Click here to <a href='index.php'>Login</a></div>";
                    }
                }else{
            ?>
          <div class="col-md-7">
            <div class="card-body">
              <p class="login-card-description">Register for a new account</p>
              <form action="" method="post" name="register">
                <div class="form-group">
                    <label for="name" class="sr-only">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input name="register" id="register" class="btn btn-block login-btn mb-4" type="submit" value="Register">
                </form>
                <p class="login-card-footer-text">Have an account? <a href="index.php" class="text-reset">Login here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <?php } ?>
</body>
</html>
