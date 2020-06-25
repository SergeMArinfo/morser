<?php include_once 'connect.php';
$pdo = getPdo();


// On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son article ou son titre
$login = htmlspecialchars($_POST["login"]);
$password = htmlspecialchars($_POST["password"]);


$query = $pdo->prepare(
    "INSERT into users (email, password VALUES ('$login', '$password')"
);

$rap  = $query->execute();

if ($rap) {
    echo json_encode("true");
} else {
    echo json_encode("false");
}
