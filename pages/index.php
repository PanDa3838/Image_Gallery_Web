<?php
require_once('../vendor/autoload.php');
use \App\Alert;
use App\authenticate;
use App\DB;
use App\image;

Alert::AlertAfterupload();

$imageobj = new image();
$allimages = $imageobj -> getimage();

$authobj = new Authenticate();
$authobj-> redirectIfNotAuth();
$authobj->logout();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Gallery - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    h1 {
  font-family: 'Poppins', sans-serif;
  font-size: 2.5rem;
  color: #1f527c;
  text-align: center;
  margin-top: 40px;
  font-weight: 500;
  letter-spacing: 1px;
}
  </style>
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/Layout/navbar.php' ?>
<h1>Hello, <?php echo $_SESSION['userName'] ?></h1>
</body>
</html>
