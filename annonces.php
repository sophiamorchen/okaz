<?php
require_once __DIR__ . "/templates/header.php";
require_once __DIR__ . "/libs/listings.php";

$listings = getListings($pdo);

?>
<div class="row">
    <h1>Les annonces</h1>

</div>
<div class="row">
    <div class="col-md-3">
        <form action="" method="get">
            <h2>Filtres</h2>
            <div class="p-3 border-bottom">
                <input type="text" name="search" id="search" class="form-control" placeholder="rechercher">
            </div>
            <div class="p-3 border-bottom">
                <label for="price">Prix</label>
                <div class="input-group">
                    <input type="number" name="min_price" id="min_price" class="form-control" placeholder="Prix minimum"><span class="input-group-text">€</span>
                </div>
                <div class="input-group">
                    <input type="number" name="max_price" id="max_price" class="form-control" placeholder="Prix maximum"><span class="input-group-text">€</span>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100" type="submit">Filtrer</button>
            </div>
        </form>
    </div>

    <div class="col-md-9">
        <div class="row">
            <?php foreach ($listings as $key => $listing) { ?>
                <?php require __DIR__ .  "/templates/listing_part.php" ?>
            <?php } ?>
        </div>

    </div>


</div>

<?php
require_once __DIR__ . "/templates/footer.php";
?>