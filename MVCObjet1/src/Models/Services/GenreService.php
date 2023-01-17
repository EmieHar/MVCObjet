<?php

namespace Emili\MvcObjet\Models\Services;

use Emili\MvcObjet\Models\Daos\GenreDao;

class GenreService {
    private $genreDao;

    public function __construct(){
        $this->genreDao = new GenreDao();
    }

    public function ListeGenres(){
        $liste = $this->genreDao->findAll();
        return ($liste);
    }

    public function get1Genre($a){
        $genre = $this->genreDao->findOne($a);
        return $genre;
    }
}

?>