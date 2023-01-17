<h1> Liste des films </h1>

<?php
foreach ( $liste as $film){ ?>
   
    <h3><?= $film->getId();?></h3>
    <h2><?= $film->getTitle();?></h2>
    <img src="<?= $film->getCoverImage();?>">

    <h3><?= $film->getDate();?></h3>
    <h3><?= $film->getDescription();?></h3>
    <h3><?= $film->getDuration();?></h3>
    <h3><?= $film->getGenre();?></h3>
    <h3><?= $film->getRealisateur();?></h3>
    <h3><?= $film->getActors();?></h3>
    


<?php }

?>
