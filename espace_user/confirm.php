<?php

$user_id = $_GET['id'];
$token = $_GET['token'];

require 'database.php';

$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');

$req->execute([$user_id]);

$user = $req->fetch();
session_start();

if($user && $user->confirmation_token == $token) {
    

    $req=$pdô->prepare('UPDATE users SET confirmationçtoken = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
    $_SESSION['auth'] = $user;
    header('Location: account.php');
 
} else{
    $_SESSION['flash']['danger'] = "ce lien n'est plus valide";
    header('Location: login.php');
}