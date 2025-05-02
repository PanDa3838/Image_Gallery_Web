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
  
<!-- <div class="background-overlay"></div>

<div class="container d-flex align-items-center justify-content-between vh-100 p-0 custom-flex"> -->
  <!-- Text Paragraph -->
  <!-- <div class="info-text">
    <pre class="styled-text">
      Want your photos to always be up-to-date? 
      <span class="brand-name">MY IMAGE</span> is the solution! 
      Upload and update your photos  with a single click,
      and start updating or deleting them anytime.
      <div class="text-center mb-3">
          <button class="btn btn-warning" id="joinUsBtn">Join Us</button>
      </div>  
    </pre>
  </div> -->

  <!-- Signup Form -->

  <!-- <div class="signup-card"> -->
    <!-- <div class="signup-header">Sign Up Here</div> -->
    <!-- <form action="" method="POST"> -->

    <h2 class="text-center mb-4">Create Account</h2>
      <form action="signup.php" method="POST">
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
      <p class="text-center mt-3 text-white">
        Already have an account? <a href="login.php">Login</a>
      </p>
      <!-- <div class="social-login text-center mt-4">
        <p class="text-white">Log in with</p> -->
        <!-- <div class="d-flex justify-content-center gap-3">
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-skype"></i></a>
        </div>
      </div>
    </form>
  </div>
</div> -->

<!-- Footer -->
<!-- <footer class="footer">
  <p class="text-center text-white">© 2025 MY Image. All Rights Reserved.</p>
</footer> -->
<!-- Java Script-->
<!-- عشان لما ادوس علي زرار الجوين يعمل هيلايت علي الفورم-->

<!-- <script>
    document.getElementById('joinUsBtn').addEventListener('click', function () {
      const formCard = document.querySelector('.signup-card');
      formCard.classList.add('form-highlight');

      setTimeout(() => {
        formCard.classList.remove('form-highlight');
      }, 2000);
    });
  </script> -->

</body>
</html>
