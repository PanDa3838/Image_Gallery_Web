<?php
require_once('../vendor/autoload.php');

use \App\alert;
use App\authenticate;
use App\DB;
use App\image;

$alertobj = new alert();
$alertobj->AlertAfterupload();

$imageobj = new image();
$allimages = $imageobj->getimage();
$authobj = new authenticate();
$authobj->redirectIfNotAuth();
$authobj->logout();

$alertobj-> AlertAfterdelete();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Gallery - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="../assets/view.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/Project-IA/pages/Layout/navbar.php' ?>

<div class="container py-5">
  <div class="row g-4">
    <?php foreach($allimages as $image): ?>
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
      <div class="gallery-card">
        <div class="image-wrapper">
          <img 
            src="uploads/<?= htmlspecialchars($image['File_Name'])?>" 
            class="gallery-img" 
            alt="<?= htmlspecialchars($image['Title']) ?>"
            onclick="showImageModal('uploads/<?= htmlspecialchars($image['File_Name'])?>')"

          >
          <div class="uploader-info">
            <img src="user.png" alt="User Avatar" class="user-avatar">
            <span class="username">
              <?= $image['File_Name'] ?> 
              <span class="image-id">#<?= htmlspecialchars($image['Image_ID']) ?></span>
            </span>
            <div class="action-icons">
              <a href="update.php?image_id=<?= $image['Image_ID'] ?>" title="Edit"><i class="fas fa-edit"></i></a>
              <a href="delete.php?image_id=<?= $image['Image_ID'] ?>" title="Delete"><i class="fas fa-trash-alt"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-3">
      <div class="modal-body p-0 text-center">
        <img id="modalImage" src="" alt="Full View">
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function showImageModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
  }
</script>

</body>
</html>
