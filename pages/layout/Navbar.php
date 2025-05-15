<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Image Gallery</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <?php if((new \App\Authenticate())->isAuth()): ?> <!-- return boolean -->
          <li class="nav-item"><a class="nav-link" href="viewimage.php">My Gallery</a></li>
          <li class = "nav-item"><a class ="nav-link" href="Upload.php">Upload</a> </li>
          <li class="nav-item"><a style="color: red" class="nav-link" href="home.php?logout=1">Logout</a></li>
          <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>