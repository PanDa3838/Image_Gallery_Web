<?php
require_once("../vendor/autoload.php");

use App\Alert;
use App\authenticate;
use App\image;

$authobj = new Authenticate();
$imageobj = new image();
$imageobj -> uploadimage();
$authobj -> logout();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Image - Image Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/upload.css" rel="stylesheet">
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/Layout/navbar.php' ?>

<!-- Upload Form -->
<div class="container d-flex align-items-center justify-content-center vh-100">
  <div class="form-card w-100" style="max-width: 500px;">
    <h2 class="text-center mb-4">Upload New Image</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Image Title</label>
        <input type="text" name="title" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Select Image</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
      </div>
      <button class="btn btn-primary w-100" type="submit" name ="upload-img">Upload</button>
    </form>
  </div>
</div>

</body>
</html>
