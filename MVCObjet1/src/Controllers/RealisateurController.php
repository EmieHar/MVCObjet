<?php

namespace Emili\MvcObjet\Controllers;

use Emili\MvcObjet\Models\Services\RealisateurService;

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