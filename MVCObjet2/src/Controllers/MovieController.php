<?php

namespace Emili\MvcObjet\MvcObjet2\Controllers;

use Emili\MvcObjet\MvcObjet2\Models\Services\MovieService;

class MovieController {
    private $movieService;
    private $twig;

    public function __construct($twig){
        $this->twig = $twig;
        $this->movieService = new MovieService();
    }

    public function listeMovies(){
        $liste = $this->movieService->ListeMovies();
        // return $liste;
      require_once __DIR__ . '/../View/MoviesView.php';
    }

    // public function listeMovies() {
    //     $lesfilms = $this->movieService->listeMovies();
    //    // return $liste;
    //    echo $this->twig->render('Movies.html.twig', ["films" => $lesfilms]); 
    // }

    public function get1Movie($a){
        $liste = $this->movieService->get1Movie($a);
        // return $liste;
        require_once __DIR__ . '/../View/MovieView.php';
    }
}

?>