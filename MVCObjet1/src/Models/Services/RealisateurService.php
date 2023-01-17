<?php

namespace Emili\MvcObjet\MvcObjet1\Models\Services;

use Emili\MvcObjet\MvcObjet1\Models\Daos\RealisateurDao;

class RealisateurService {
    private $realisateurDao;

    public function __construct(){
        $this->realisateurDao = new RealisateurDao();
    }

    public function ListeRealisateurs(){
        $liste = $this->realisateurDao->findAll();
        return ($liste);
    }

    public function get1Realisateur($a){
        $realisateur = $this->realisateurDao->findOne($a);
        return $realisateur;
    }
}

?>