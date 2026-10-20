<?php

function displayErrors(array $errors, string $input)
{
    if (isset($errors[$input])) {
        echo "<div class='alert alert-danger' role='alert'>" . htmlspecialchars($errors[$input]) .
            "</div>";
    }
}
