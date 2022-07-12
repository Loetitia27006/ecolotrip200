<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./style/accueil.css">
</head>
<body>

    <section class="section1">
        
    <?php require "includes/header.php";?>

        <h1>Le very best trip de ta </br> vie commence ici</h1>
    </section>
    <div class="wrapper">
        <div class="slider">
            <div class="slide">
                <img src="./images/campagne.svg" alt="">
                <img src="./images/mer.svg" alt="">            
                <img src="./images/voiture.svg" alt="">
                <img src="./images/ville.svg" alt="">
                <img src="./images/montagne.svg" alt="">
                <img src="./images/foret.svg" alt="">
                <img src="./imgages/bus.svg" alt="">
                <img src="./images/avion.svg" alt="">
                <img src="./images/bateau.svg" alt="">
                <img src="./images/velo.svg" alt="">
                <img src="./images/camping.svg" alt="">
            </div>
            <div class="slide">
                <img src="./images/campagne.svg" alt="">
                <img src="./images/mer.svg" alt="">      
                <img src="./images/voiture.svg" alt="">
                <img src="./images/ville.svg" alt="">
                <img src="./images/montagne.svg" alt="">
                <img src="./images/foret.svg" alt="">
                <img src="./imgages/bus.svg" alt="">
                <img src="./images/avion.svg" alt="">
                <img src="./images/bateau.svg" alt="">
                <img src="./images/velo.svg" alt="">
                <img src="./images/camping.svg" alt="">
            </div>
            <div class="controls">
                <span class="arrow left">left</span>
                <span class="arrow right">right</span>
            </div>
        </div>
</div>
<?php require "includes/footer.php";?>



<script>
    const slider = document.querySelector('.slider');
    const leftArrow = document.querySelector('.left');
    const rightArrow = document.querySelector('.right');

    var sectionIndex = 0;

    rightArrow.addEventListener('click', function() {
        sectionIndex = sectionIndex + 1;
        slider.style.transform = 'translateX(' +(sectioIndex) * -25 + '%)';
    });

</script>
</body>
</html>















