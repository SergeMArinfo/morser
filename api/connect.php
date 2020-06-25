<?php
// connexion a la base de données morser
function getPdo(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=morser;charset=utf8', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
}
