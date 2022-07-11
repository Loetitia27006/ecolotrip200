<?php 
require "includes/header.php";
require 'includes/functions.php';

require_once 'database.php';

if(!empty($_POST) ){
    $errors = array();
     if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Ton email n'est pas valide";
    }

     else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
      

        if($user){

            $errors['email'] = 'Ce email est déjà utilisé';
        }
    }



    if(empty($_POST['password']) || $_POST['password'] !== $_POST['confirm_password']) {
        $errors['password'] = "Ton mot de passe n'est pas valide";
    }


    if(empty($errors)){
          $req = $pdo->prepare("INSERT INTO users SET password = ?, email = ?, confirm_password = ?, confirmation_token = ?");

        //$username = $_POST['username'];

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $token = str_random(60);
        $req->execute([$password, $_POST['email'], $token]);
        $user_id = $pdo->lastInsertId();

        mail($_POST['email'], 'Confirmation de ton compte', "Afin de valider ton compte merci de cliquer sur ce lien\n\nhttp://localhost/espace-user/confirm.php?id=$user_id&token=$token");
        
        $_SESSION['flash']['success'] = "Un email de confirmation t'a été envoyé pour valider ton inscription";
        header('Location: login.php');
        exit();
    }

}
   

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/inscription.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/footer.css">


    <title>Inscription</title>
   
</head>
<body>




    <?php if(!empty($errors)): ?>

    <div class = "errors">
        <p>Vous n'avez pas remplis le formulaire correctement</p>
        
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?=$error;?></li>
                <?php endforeach; ?>
            </ul>
    </div>
    <?php endif; ?>


<h1>Deviens un triper !</h1>
    <div class="form">
        <form action="" method="post">
            
            <p><input type="email" name="email" id="" placeholder="ton adresse mail"></p>
        
            </p><input type="password" name="password" id="" placeholder="ton mot de passe"></p>
            </p><input type="password" name="confirm_password" id="" placeholder="confirme ton mot de passe"></p>
            <p class="cross" ><input class="check"type="checkbox" name="check" id="">recevoir la newsletter</p>
            <p ><button type="submit">  S'inscrire</button></p>
            <p class="connection">déjà un compte ? <a href="login.php">Se connecter</a></p>
        </form>
    </div>


    <?php require "includes/footer.php";?>
</body>
</html>