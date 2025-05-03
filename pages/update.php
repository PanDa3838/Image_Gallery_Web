<?php

use App\Alert;
use App\Authenticate;
use App\image;

require_once('../vendor/autoload.php');

$authobj = new Authenticate();
$authobj -> redirectIfNotAuth();
$authobj -> logout();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Image - Image Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/update.css" rel="stylesheet">

</head>
<body>



<?php
if (empty($_GET['image_id'])){
    Alert::PrintMessage("cannot access this page","danger");
    exit();
}

$image_id = $_GET['image_id'];

$imageObject = new image();

$imageoUpdateArr = $imageObject->getimgById($image_id);

require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/Layout/navbar.php';

$imageObject->updateimage();


?>



<!-- Update Form -->
<div class="container d-flex align-items-center justify-content-center vh-100">
<div class="form-card w-100" style="max-width: 500px;">
    <h2 class="text-center mb-4">Update Image Info</h2>
    <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Image ID</label>
        <input type="number" name="image_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>New Title</label>
        <input  type="text" name="new_title" class="form-control">
    </div>
    <div class="mb-3">
        <label>Replace Image </label>
        <input type="file" name="new_image" class="form-control" accept="image/*">
        </div>
    <button class="btn btn-warning w-100" type="submit" name="btn_update_image">Update Image</button>
    </form>
</div>
</div>

</body>
</html>