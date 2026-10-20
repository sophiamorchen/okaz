<?php
require_once __DIR__ . '/templates/header.php';
require_once __DIR__ . '/libs/pdo.php';
require_once __DIR__ . '/libs/user.php';

$error = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);
    var_dump($user);
    if ($user) {
        session_regenerate_id(true); // contre les fixations de session
        $_SESSION["user"] = [
            "username" => $user["username"],
            "id" => $user["id"]
        ];
        header("Location: index.php");
    } else {
        $error = "Email ou mot de passe incorrects";
    }
}
?>


<div class="form-signin w-100 m-auto">
    <form method="post">
        <h1 class="h3 mb-3 fw-normal">Se connecter</h1>

        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            <?php endif ?>
            <button class="btn btn-primary w-100 py-2" type="submit">Connexion</button>
    </form>
</div>


<?php require_once __DIR__ . "/templates/footer.php" ?>