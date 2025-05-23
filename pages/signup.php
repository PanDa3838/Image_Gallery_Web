<?php
  use App\Authenticate;
  require_once("../vendor/autoload.php");
  $authObj = new Authenticate();
  $authObj->signUp();
  $authObj->redirectIfAuth();
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - Image Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/signup.css" rel="stylesheet">
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/layout/navbar.php'; ?>

<!-- Page Layout -->
<div class="container d-flex align-items-center justify-content-center vh-100">
<div class="signup-card w-100" style="max-width: 450px;">
  
    <h2 class="text-center mb-4">Create Account</h2>
      <form method="POST">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" required>
      </div>
      <button class="btn btn-warning w-100" name="signUpBtn" type="submit">Sign Up</button>
      <p class="text-center mt-3 text-black">
        Already have an account? <a href="login.php">Login</a>
      </p>
      

</body>
</html>
