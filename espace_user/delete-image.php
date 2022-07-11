<?php
session_start();
$bdd = require_once 'database.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $getId = $_GET['id'];
   
    $recupImage = $bdd->prepare('SELECT * FROM images WHERE id = :id');
    $recupImage->bindValue(':id', $getId);
    $recupImage->execute();

    $nameImage=$recupImage->fetch();

    $imageUrl = '/images/uploads/'.$nameImage['name'];
   

    print_r($nameImage);

   
    if(file_exists($imageUrl)){

        //delete the image
        unlink($imageUrl);
    }

    if($recupImage->rowCount() > 0) {
        $deleteImage = $bdd->prepare('DELETE FROM images where id = ?');
        $deleteImage->execute(array($getId));
        
       
        header("Location: gallery.php");


    }else {
        echo "aucune image trouvé";
    }

}else{
    echo "id n'a pas été récupérer!";
}





?>