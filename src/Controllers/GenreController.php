<?php

namespace Emili\MvcObjet\Controllers;

use Emili\MvcObjet\Models\Services\GenreService;

class GenreController {

    private $genreService;

    public function __construct(){
        $this->genreService = new GenreService();
    }

    public function ListeGenres(){
        $liste =  $this->genreService->ListeGenres();
       return $liste;
    }

    public function get1Genre($a){
        $liste =  $this->genreService->get1Genre($a);
        return $liste;
    }
}

?>