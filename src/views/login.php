<?php

  if(AuthController::isLoggedIn()){
    AuthController::redirectToIndex();
  }

  $msg = "";
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $msg = "Incorrect username / password";

    if(UserController::validate($username, $password)) {
      $_SESSION["user"] = $username;
      AuthController::redirectToIndex();
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/<?= $_ENV['SRC_DIR']?>/assets/css/style.css" />
    <link rel="stylesheet" href="/<?= $_ENV['SRC_DIR']?>/assets/css/login.css" />
    <title>Curriculum Builder</title>

    <script src="https://kit.fontawesome.com/be947b2e4a.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <a class="floating-button floating-button-left" href="/<?= $_ENV['BASE_DIR']?>">
      <i class="fa fa-arrow-left"></i>  
    </a>
    <div class="w-100 vh-100 d-flex justify-center align-center">
      <div class="login">
        <div class="login-header">
        <h1>Login Panel</h1>
          <p>Sign in to your account</p>
          <?php 
            if($msg !== "") echo "<p class=\"color-danger\">{$msg}</p>";
          ?>
        </div>


        <form action="#" method="POST">
          <div class="form-row">
            <div class="form-group">
              <label for="username">Username</label>
              <input
                type="text"
                name="username"
                id="username"
                placeholder="Username"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="password">Password</label>
              <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
              />
            </div>
          </div>
          <div class="form-row">
            <button type="submit">SUBMIT</button>
          </div>
        </form>

        <div class="copyright">
          <p><small>Paulo Vareiro @ 2022 All Rights Reserved</small></p>
        </div>
      </div>
    </div>
    
    <script src="/<?=$_ENV['SRC_DIR']?>/assets/js/lib/jquery.js"></script>
    <script src="/<?= $_ENV['SRC_DIR']?>/assets/js/script.js"></script>
  </body>
</html>
