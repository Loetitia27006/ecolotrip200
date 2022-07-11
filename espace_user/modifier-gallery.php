

<!-- modifier le titre de la photo, select et update-->


<?php
session_start();
$bdd = require_once 'database.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $getId = $_GET['id'];
    $stmt= $bdd->prepare('SELECT * FROM images WHERE id = ?');

    $stmt->execute(array($getId));
   $infoImage = $stmt->fetch();
   

    if($count= $stmt->rowCount() > 0) {
     
        // print_r($infoImage);

        $title = $infoImage['title'];
        //$image = $infoImage['image_url'];

        if(isset($_POST['modifier'])) {
            $titre_saisi = htmlspecialchars($_POST['title']);
            
            $updateImage = $bdd->prepare('UPDATE images SET title = ? WHERE id = ?');
            $updateImage->execute(array($titre_saisi, $getId));
            header ('Location: gallery.php');         
        }

       



    }else {
        echo "aucune image trouvé";
    }

}else{
    echo "id n'a pas été récupérer!";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="title" placeholder="title" value="<?=$title; ?>">
        <br><br>
        <input type="submit" name="modifier" id="">
    </form>
        

    </form>
    
</body>
</html>