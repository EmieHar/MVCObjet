<h1> Liste de acteurs </h1>

<?php
foreach ( $liste as $actor){ ?>
   
    <h2><?= $actor->getFirstname();?>
        <?= $actor->getLastname();?></h2>
<?php }

?>