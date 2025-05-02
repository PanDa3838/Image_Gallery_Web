<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Image - Image Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/delete.css" rel="stylesheet">
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/Layout/navbar.php' ?>
<!-- Delete Form -->
<div class="container d-flex align-items-center justify-content-center vh-100">
  <div class="form-card w-100" style="max-width: 500px;">
    <h2 class="text-center mb-4">Delete Image</h2>
    <form action="delete.php" method="POST">
      <div class="mb-3">
        <label>Image ID</label>
        <input type="number" name="image_id" class="form-control" required>
      </div>
      <button class="btn btn-danger w-100" type="submit">Delete Image</button>
    </form>
  </div>
</div>

</body>
</html>
