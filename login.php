<?php
require_once __DIR__ . '/templates/header.php';
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
        <input class="btn btn-primary w-100 py-2" type="submit" value="Enregistrer">
    </form>
</div>


<?php require_once __DIR__ . "/templates/footer.php" ?>