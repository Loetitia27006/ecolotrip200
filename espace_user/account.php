
<?php

$title = 'profil';
require 'includes/functions.php';

only_logged();

require "includes/header.php";

?>

<h1>Bonjour, <?=$_SESSION['auth']['email']; ?> !</h1>

<a href="change-password.php">Modifier le mot de passe</a>

<div class="profil">
    <h1>Ton profil</h1>
    <div class="profil-photo">
        <div class="photouser"></div>
        <div class="pseudouser">pseudo</div>
    </div>
</div>

<div class="partage">
    <h1>Partage tes photos !</h1>
    <p ><button type="submit"><a href="upload-images.php">Envoyer</a></button></p>
</div>
<div class="container">
    <div class="form">
    <form action="" method="post">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="lastname">nom</label>
        <input type="text" name="lastname" id="lastname">

        <label for="firstname">prénom</label>
        <input type="text" name="firstname" id="firstname">

        <label for="phoneNumber">téléphone</label>
        <input type="text" name="phoneNumber" id="phoneNumber">

        <label for="dateOfBirth">date de naissance</label>
        <input type="date" name="dateOfBirth" id="dateOfBirth">

        <label for="address">adresse</label>
        <input type="text" name="address" id="address">

        <label for="gender">genre</label>
        <input type="text" name="gender" id="gender">

        <label for="email">email</label>
        <input type="email" name="email" id="email">

        <p>mot de passe</p><a href="change-password.php">modifier</a>
        <p>gallerie photo perso : </p> <a href="gallery.php"><img src="" alt="">picto appareil photo</a>
        <p>préférences </p> <a href="preferences.php">modifier</a>

        <button type="submit">Enregister</button>

    </form>
    
        <a href="delete-account.php">supprimmer mon compte</a>
</div>
</div>

<?php require_once "includes/footer.php"?>




