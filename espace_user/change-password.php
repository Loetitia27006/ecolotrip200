<?php


require 'includes/functions.php';
require 'includes/header-loggedin.php';

only_logged();

if(!empty($_POST)){


    if(empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']){
        $_SESSION['flash']['danger'] = "Les mots de passe ne correspondent pas!";

    }else {
        $user_id = $_SESSION['auth']->id;
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once "database.php";
        $req = $pdo->prepare('UPDATE users SET password = ?');
        $req->execute([$password]);
        $_SESSION['flash']['success'] = "Le mot de passe a été bien modifié!";
    }
}


?>


<h1>Modifier le mot de passe</h1>

<div class="form">
<form action="" method="POST">

<input type="password" name="password" placeholder="nouveau mot de passe">

<br><br>
<input type="password" name="confirm_password" placeholder="confirmer nouveau mot de passe">
<br><br>

<button>Sauvegarder</button>



</form>

</div>

<?php include_once './includes/footer.php'; ?>