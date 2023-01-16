<?php

namespace Emili\MvcObjet\Controllers;

use Emili\MvcObjet\Models\Services\ActorService;

class ActorController {
    private $actorService;

    public function __construct(){
        $this->actorService = new ActorService();
    }

    public function ListeActeurs(){
        $liste = $this->actorService->ListeActeurs();
       return $liste;
    }

    public function get1Acteur($a){
        $liste = $this->actorService->get1Acteur($a);
        return $liste;
    }
}

?>