<?php

namespace Emili\MvcObjet\Controllers;

use Emili\MvcObjet\Models\Services\MovieService;

class MovieController {
    private $movieService;
    private $twig;

    public function __construct($twig){
        $this->twig = $twig;
        $this->movieService = new MovieService();
    }

    // public function ListeActeurs(){
    //     $liste = $this->movieService->ListeActeurs();
    //     // return $liste;
    //   require_once __DIR__ . '/../View/MoviesView.php';
    // }

    public function listeActeurs() {
        $lesacteurs = $this->movieService->listeActeurs();
       // return $liste;
       echo $this->twig->render('Movies.html.twig', ["acteurs" => $lesacteurs]); 
    }

    public function get1Acteur($a){
        $liste = $this->movieService->get1Acteur($a);
        // return $liste;
        require_once __DIR__ . '/../View/MovieView.php';
    }
}

?>