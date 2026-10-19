<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/libs/listings.php";

var_dump($_GET);

if (isset($_GET['id'])) {
    $listing = getListingById($_GET['id']);
}


?>

<div class="container col-xxl-12 px-1 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-4">
            <img src="/uploads/listing/<?= $listing['image'] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-8">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $listing['titre'] ?></h1>
            <h2><?= $listing['price'] ?></h2>
            <p class="lead"><?= $listing['description'] ?></p>
        </div>
    </div>
</div>


<?php
require_once __DIR__ . "/templates/footer.php";
?>