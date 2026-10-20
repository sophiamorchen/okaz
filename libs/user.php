<?php

function addUser(PDO $pdo, string $username, string $email, string $password): bool
{
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = $pdo->prepare("INSERT INTO user (username, email, password) VALUES(:username, :email, :password)");
    $query->bindValue(":username", $username, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":password", $passwordHash, PDO::PARAM_STR);

    return $query->execute();
}

function verifyUser(array $user): array|bool        // array : on précise que $user est un tableau
{
    $errors = [];

    // Nom d'utilisateur
    if (!isset($user['username'])) {                  // la case n'existe pas
        $errors['username'] = "Le champ utilisateur n'a pas été envoyé";
    } elseif (trim($user['username']) === '') {       // existe, mais vide ou seulement des espaces
        $errors['username'] = "Le champ utilisateur est obligatoire";
    }

    // Email
    if (!isset($user['email'])) {
        $errors['email'] = "Le champ email n'a pas été envoyé";
    } elseif (trim($user['email']) === '') {
        $errors['email'] = "Le champ email est obligatoire";
    } elseif (!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {   // format invalide
        $errors['email'] = "Le format d'email n'est pas respecté";
    }

    // Mot de passe (pas de trim)
    if (!isset($user['password'])) {
        $errors['password'] = "Le champ du mot de passe n'a pas été envoyé";
    } elseif (mb_strlen($user['password']) < 8) {    // compte les lettres, pas les octets
        $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères";
    }

    return count($errors) ? $errors : true;          // des erreurs → le tableau ; aucune → true
}


function verifyUserLoginPassword(PDO $pdo, string $email, string $password): bool|array
{
    $query = $pdo->prepare("SELECT id, username, email, password FROM user WHERE email = :email ");
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return false;
    }
}
