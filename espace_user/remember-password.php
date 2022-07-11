<?php 
if(!empty($_POST) && !empty($_POST['email'])){
    require_once 'database.php';
    require_once 'includes/functions.php';

    $req = $pdo->prepare('SELECT * FROM users WHERE email = ?'); // après la vérification par mail, rajouter confirmed_at ('SELECT * FROM users WHERE email = :email AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();

  
    if($user) {
        session_start();
        $reset_token = str_random(60);

        $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id = ?')->execute([$reset_token, $user->id]);

        $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://local.dev/Lab/Comptes/reset.php?id={$user->id}&token=$reset_token");
        header('Location: login.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cet adresse';
    }


    
} ?>

<?php

require "includes/header-loggedin.php";

?>


<form action="" method="POST">

<input type="email" name="email" placeholder="email">
<br><br>
<input type="submit" value="valider">  
</form>