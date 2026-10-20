<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/libs/pdo.php';
require_once __DIR__ . '/libs/user.php';
require_once __DIR__ . '/errors.php';


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verif = verifyUser($_POST);
    if ($verif === true) {
        $resAdd = addUser($pdo, $_POST['username'], $_POST['email'], $_POST['password']);
        header("Location: index.php");
    } else {
        $errors = $verif;
        echo "L'inscription n'a pas réussi";
    }
}
var_dump($_POST);

?>




<div class="form-signin w-100 m-auto">

    <h1>Inscription</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label class="form-label" for="username">Nom d'utilisateur</label>
            <input class="form-control" type="text" name="username" id="username">
            <?php displayErrors($errors, "username") ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">email</label>
            <input class="form-control" type="text" name="email" id="email">
            <?php displayErrors($errors, "email") ?>

        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Mot de passe</label>
            <input class="form-control" type="password" name="password" id="password">
            <?php displayErrors($errors, "password") ?>

        </div>
        <button class="btn btn-primary w-100 py-2" type="submit" name="add_user">S'inscrire</button>
    </form>
</div>

<?php require_once __DIR__ . "/templates/footer.php" ?>