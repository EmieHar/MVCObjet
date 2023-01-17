<?php

namespace Emili\MvcObjet\Models\Services;

use Emili\MvcObjet\Models\Daos\MovieDao;

class MovieService {
    private $movieDao;

    public function __construct(){
        $this->movieDao = new MovieDao();
    }

    public function ListeActeurs(){
        $liste = $this->movieDao->findAll();
        return ($liste);
    }

    public function get1Acteur($a){
        $actor = $this->movieDao->findOne($a);
        return $actor;
    }
}

?>