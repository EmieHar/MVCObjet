<?php

namespace Emili\MvcObjet\MvcObjet1\Controllers;

use Emili\MvcObjet\MvcObjet1\Models\Services\RealisateurService;

class RealisateurController {
    private $realisateurService;

    public function __construct(){
        $this->realisateurService = new RealisateurService();
    }

    public function ListeRealisateurs(){
        $liste = $this->realisateurService->ListeRealisateurs();
       return $liste;
    }

    public function get1Realisateur($a){
        $liste = $this->realisateurService->get1Realisateur($a);
        return $liste;
    }
}

?>