<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Gallery - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/myupload.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/testproject/pages/Layout/navbar.php' ?>

<div class="container py-5">
  <div class="row g-4">
    
    <!-- Dynamic Gallery Card (example) -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="gallery-card">
        <div class="image-wrapper">
          <img src="2.jpg" class="gallery-img" alt="Gallery Image">

          <!-- Overlay with icons -->
          <div class="overlay">
            <div class="action-icons">
              <a href="update.php?image_id=1"><i class="fas fa-edit"></i></a>
              <a href="delete.php?image_id=1"><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
        </div>

        <!-- Uploader Info -->
        <div class="uploader-info">
          <img src="2.jpg" alt="User Avatar" class="user-avatar">
          <span class="username">3mko Karim</span>
        </div>
      </div>
    </div>

    <!-- Repeat more cards as needed -->

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
