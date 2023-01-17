<h1> Liste des films </h1>
<hr>

<?php
foreach ( $liste as $film){ ?>
   
    <h3><?= $film->getId();?></h3>
    <h2><?= $film->getTitle();?></h2>
    <img src="<?= $film->getCoverImage();?>">

    <h3><?= $film->getDate();?></h3>
    <h3><?= $film->getDescription();?></h3>
    <h3><?= $film->getDuration();?> minutes</h3>
    <hr>
   
    


<?php }

 ?>
