<h1> Voici votre film : </h1>


  <?php
//   echo"<pre>";
//   print_r($liste);
//   echo"</pre>";
?>
 <h3><?= $liste->getId();?></h3>
    <h2><?= $liste->getTitle();?></h2>
    <img src="<?= $liste->getCoverImage();?>">
    <h3>Année de sortie: <?= $liste->getDate();?> | Durée: <?= $liste->getDuration();?> minutes</h3>
    <h3>Description: <?= $liste->getDescription();?></h3>
    <h3>Acteurs</h3>
    <h3></h3>
    
    <hr>


  
  
