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

function verifyUser($user): array|bool
{
    $errors = [];
    if (isset($user['username'])) {
        if ($user['username'] === '') {
            $errors['username'] = "Le champ utilisateur est obligatoire";
        }
    } else {
        $errors['username'] = "Le champ utilisateur n'a pas été envoyé";
    }
    if (count($errors)) {
        return $errors;
    } else {
        return true;
    }
}
