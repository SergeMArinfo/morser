<?php 
session_start();

include_once 'connect.php';
$pdo = getPdo();

// si pas de session retour sur index
if(!$_SESSION["email"]){
    header("Location: index.php");
    exit();
}

 // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son article et son titre
$titre = htmlspecialchars($_POST["titre_item"]);
$article = htmlspecialchars($_POST["article_item"]);

$id_user = $_SESSION["id_user"];

$query = $pdo->prepare(
    "insert into items (titre_item, article_item, id_user values ('$titre', '$article' ,$id_user)"
);

$rap  = $query->execute();

if ($rap) {
    echo json_encode("true");
} else {
    echo json_encode("false");
}


