<?php
session_start();

include_once 'connect.php';
$pdo = getPdo();

if (isset($_POST['email'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $pdo->prepare(
        "SELECT * FROM users WHERE email = '$email'  AND password = '$password' "
    );
    $query->execute();
    $result = $query->fetchObject();
    
    


    if ($query->rowCount()) {
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["id_user"] = $result->id_user;
        echo json_encode("true") ;
    }else{
        session_destroy();
        echo json_encode("false");
    }
}
