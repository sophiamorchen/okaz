<?php
require_once __DIR__ . '/templates/header.php';
require __DIR__ . "/libs/categories.php";

$categories = getCategories();

?>
<div class="form-listing w-100 m-auto">

    <h1>Ajouter une annonce</h1>

    <form action="" method="get">
        <div class="mb-3">
            <label class="form-label" for="title">Titre</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">Prix</label>
            <input class="form-control" type="number" name="price" id="price">
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="category">Categorie</label>
            <select name="category" id="category" class="form-select">
                <?php foreach ($categories as $key => $category) { ?>
                    <option value="<?= $key ?>"><?= $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">image</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Ajouter</button>
    </form>
</div>

<?php require_once __DIR__ . "/templates/footer.php" ?>