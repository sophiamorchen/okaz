<?php
session_start(); // reprend la session de la visiteuse grâce au cookie PHPSESSID
session_unset(); // vide tout le contenu de $_SESSION (dont 'user')
session_destroy(); // supprime le fichier de session sur le serveur (le cookie, lui, reste dans le navigateur)
header("Location: index.php"); // redirige vers l'accueil