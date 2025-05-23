<?php
require_once("../vendor/autoload.php");

use App\Alert;
use App\Authenticate;
$authObj = new Authenticate();
Alert::alertAfterSignUp();
$authObj->login();
$authObj->redirectIfAuth();
$authObj -> logout();
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Image Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/login.css" rel="stylesheet">

</head>
<body>
  
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/layout/navbar.php'; ?>


  <!-- Login Form -->
  <div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="login-card w-100" style="max-width: 400px;">
      <h2 class="text-center mb-4">Login</h2>
      <form method="POST">
        <div class="mb-3">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-4">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button name="logInBtn" type="submit" class= "btn btn-primary w-100">Login</button>
        <p class="text-center mt-3">
          Don't have an account? <a href="signup.php">Sign up</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>