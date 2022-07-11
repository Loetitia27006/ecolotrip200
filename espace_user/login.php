
<?php 
require "includes/header-loggedin.php";

require_once 'includes/functions.php';
reconnect_from_cookie();
//session_start();
if(isset($_SESSION['auth'])){
    header('Location: account.php');
        exit();
}


if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
    require_once 'database.php';
    

    //session_start();

    $req = $pdo->prepare('SELECT * FROM users WHERE email = :email'); // après la vérification par mail, rajouter confirmed_at ('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['email' => $_POST['email']]);
    $user = $req->fetch();


    if($user == null){
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte'; 
    }
    elseif(password_verify($_POST['password'], $user['password'])) {
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté.';
        if($_POST['remember']) {
            $remember_token = str_random(250);
            $pdo->prepare('UPDATE users SET remember_token = ? WHERE id = ?')->execute([$remember_token, $user->id]);
            setcookie('remember', $user->id . '==' . $remember_token . sha1($user->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
        }
        header('Location: account.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrecte";
    }


    
} ?>





<?php 
$title = 'ECOLOTRIP'
?>



    
    <h1>Bon retour Triper !</h1>
    <div class="form">
        <form action="" method="post">
            
            <p><input type="email" name="email" id="" placeholder="ton adresse mail"></p>
        
            </p><input type="password" name="password" id="" placeholder="ton mot de passe"></p>
            <input class="checkbox" type="checkbox" name="remember" value="1"> Se souvenir de moi
            <p class="connection"><button type="submit">  Se connecter</button></p> 
            <div class="inscription">
                <p class="mdp"><a href="remember-password.php">mot de passe oublié</a></p>
                <p >pas de compte ?<a href="inscription.php">s'inscrire</a></p>
            </div>
        </form>
    </div>
 
    <?php include_once './includes/footer.php'; ?>



    


