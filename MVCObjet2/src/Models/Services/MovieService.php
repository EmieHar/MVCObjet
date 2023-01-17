<?php

namespace Emili\MvcObjet\MvcObjet2\Models\Services;

use Emili\MvcObjet\MvcObjet2\Models\Daos\MovieDao;

class MovieService {
    private $movieDao;

    public function __construct(){
        $this->movieDao = new MovieDao();
    }

    public function ListeMovies(){
        $liste = $this->movieDao->findAll();
        return ($liste);
    }

    public function get1Movie($a){
        $actor = $this->movieDao->findOne($a);
        return $actor;
    }
}

?>