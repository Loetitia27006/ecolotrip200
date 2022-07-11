<?php

require "includes/functions.php";
only_logged();
require_once "database.php";
require_once "includes/header.php";
?>




	<title>Gallery</title>
</head>

<body>


	<?php
	
	$stmt = $pdo->prepare('select * from images');
	$stmt->execute();
	$imagelist = $stmt->fetchAll();
	?>
	
	






<div class="profil">
        <h1>Ta gallerie </br>
        de souvenirs</h1>
        <div class="profil-photo">
            <div class="photouser"></div>
            <div class="pseudouser">pseudo</div>
        </div>
    </div>
    <div class="partage">
        <h1>Partage tes photos !</h1>
        <p ><button type="submit"><a href="upload-images.php">Envoyer</a></button></p>
    </div>


    <section class="section1" id="section1">

   <div class="container">
	


	<?php
	foreach($imagelist as $image) {
	?> 
	
			<div class="col">
				  <div class="card">
                <div class="photosouvenir">
					<img src="<?=$image['image_url']?>" alt="" style="width:100%; height:100%">
				</div>
                <div class="lieusouvenir"><?=$image['title']?></div>
				<a href="modifier-gallery.php?id=<?=$image['id']; ?>"> <img src="./images/modify.svg" alt=""></a>
				<a href="delete-image.php?id=<?=$image['id']; ?>"> <img src="./images/croix.svg" alt=""></a>
            </div>
			</div>
          
        
	
	<?php

	}


	?>

      </div>
    </section>
	

<?php include_once "includes/footer.php"?>
