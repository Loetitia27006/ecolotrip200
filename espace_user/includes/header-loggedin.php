<?php 

if(session_status() === PHP_SESSION_NONE){
  session_start();  
}


//https://grafikart.fr/tutoriels/gestion-membre-229
?>




    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/galphotuser.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/contact.css">
    <link rel="stylesheet" href="./style/footer.css">

</head>

<body>


<header>
    <nav>
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">


<?php if(isset($_SESSION['flash'])): ?>
<?php foreach($_SESSION['flash'] as $type => $message): ?>

<div class="alert alert-<?=$type; ?>">
    <?= $message; ?>
</div>

<?php endforeach; ?>
<?php unset($_SESSION['flash']); ?>
<?php endif; ?>

    
<?php if (isset($_SESSION['auth'])): ?>
   
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="about.php">
                    <li>About</li>
                </a>
                <a href="account.php">
                    <li>Profil</li>
                </a>
                <a href="logout.php">
                    <li>Deconnexion</li>
                </a>
                <a href="gallery.php">
                    <li>Gallery</li>
                </a>



                <a href="contact.php">
                    <li>Contact</li>
                </a>
                <a href="https://erikterwan.com/" target="_blank">
                    <li>Show me more</li>
                </a>
     

<?php else: ?>

 
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="about.php">
                    <li>About</li>
                </a>
                <a href="login.php">
                    <li>Se connecter</li>
                </a>
                <a href="inscription.php">
                    <li>S'inscrire</li>
                </a>

                <a href="contact.php">
                    <li>Contact</li>
                </a>
                <a href="https://erikterwan.com/" target="_blank">
                    <li>Show me more</li>
                </a>
          


<?php endif; ?>


  </ul>
        </div>
        </div>
        <div class="logo">
            <img src="./images/image.jpg" alt="">
        </div>
        <div class="login">
            <a href="login.php"><img src="./images/login.jpg" alt=""></a>
            
        </div>
    </nav>
</header>