<h1> Voici votre film : </h1>


   
<h3><?= $liste->getId();?></h3>
    <h2><?= $liste->getTitle();?></h2>
    <img src="<?= $liste->getCoverImage();?>">

    <h3><?= $liste->getDate();?></h3>
    <h3><?= $liste->getDescription();?></h3>
    <h3><?= $liste->getDuration();?> minutes</h3>
    <hr>