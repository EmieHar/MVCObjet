<?php

namespace Emili\MvcObjet\Controllers;

use Emili\MvcObjet\Models\Services\ActorService;

class ActorController {
    private $actorService;
    private $twig;

    public function __construct($twig){
        $this->twig = $twig;
        $this->actorService = new ActorService();
    }

    // public function ListeActeurs(){
    //     $liste = $this->actorService->ListeActeurs();
    //     // return $liste;
    //   require_once __DIR__ . '/../View/ActorsView.php';
    // }

    public function listeActeurs() {
        $lesacteurs = $this->actorService->listeActeurs();
       // return $liste;
       echo $this->twig->render('Actors.html.twig', ["acteurs" => $lesacteurs]); 
    }

    public function get1Acteur($a){
        $liste = $this->actorService->get1Acteur($a);
        // return $liste;
        require_once __DIR__ . '/../View/ActorView.php';
    }
}

?>