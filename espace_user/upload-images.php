<?php
require 'includes/header-loggedin.php';
$bdd = require "database.php";

if(isset($_POST['submit']) && isset($_FILES['my_image'])) {


	// echo "<pre>";
	// print_r($_FILES['my_image']);
	// echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
	$title = htmlspecialchars($_POST['title']);
	

	if($error === 0) {
		if($img_size > 1250000) {
			echo  "image est trop grande!";
	
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
	
			if(in_array($img_ex_lc, $allowed_exs)){
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = './images/uploads/'.$new_img_name;


				move_uploaded_file($tmp_name, $img_upload_path);
			

				//insert into Database
				$uploadImage = $bdd->prepare('INSERT INTO images (name, image_url, title) VALUES (?, ?, ?)');
				$uploadImage->execute(array($new_img_name, $img_upload_path, $title));
				header('Location: gallery.php');
			
			
				
			} else {
				echo "pas le bon type";
		
			}
		}
	
	} else {
		
	}
	
	echo "File upload successfully";
}




?>


	<h1>Ajouter les Images</h1>

	<div class="form">
	<form method='post' action='' enctype='multipart/form-data'>
		<input type="text" name="title" placeholder="titre">
		<input type='file' name='my_image' multiple />

		<button type="submit" name="submit"> Envoyer</button>
		
	</form>
	</div>
	


	<a href="gallery.php">Voir les images</a>


	<?php require 'includes/footer.php';?>