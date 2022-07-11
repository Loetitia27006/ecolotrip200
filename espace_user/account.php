
<?php


require 'includes/functions.php';

only_logged();

require "includes/header-loggedin.php";

?>

<h1>Bonjour, <?=$_SESSION['auth']['email']; ?> !</h1>

<a href="change-password.php">Modifier le mot de passe</a>


</form>




