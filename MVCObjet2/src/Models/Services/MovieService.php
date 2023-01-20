<?php

namespace Emili\MvcObjet\MvcObjet2\Models\Services;

use Emili\MvcObjet\MvcObjet2\Models\Daos\MovieDao;
use Emili\MvcObjet\MvcObjet2\Models\Daos\ActorDao;
use Emili\MvcObjet\MvcObjet2\Models\Daos\GenreDao;
use Emili\MvcObjet\MvcObjet2\Models\Daos\RealisateurDao;

class MovieService {
    private $movieDao;
    private $actorDao;
    private $genreDao;
    private $realisateurDao;

    public function __construct(){
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->genreDao = new GenreDao();
        $this->realisateurDao = new RealisateurDao();
    }

    public function ListeMovies(){
        $liste = $this->movieDao->findAll();
        return ($liste);
    }

    public function getById($id)
    {     
        // fabrication de l'objet movie. 
        $movie = $this->movieDao->findById($id);  // recherche dans movieDao ( $id = id du movie 
        $actors = $this->actorDao->findByMovie($id); // recherche des acteurs pour 1 film 
        foreach ($actors as $actor) {
            // fonction dans la classe Movie sans Entities
            $movie->addActor($actor);  // fonction ajoute 1 acteur à l'objet movie (voir classe/entité Movie)
        }

        $genre = $this->genreDao->findByMovie($id); // recherche du genre + creation de l'objet genre
        $movie->setGenre($genre);
        
        $director = $this->realisateurDao->findByMovie($id);// recherche du realisateur + creation de l'objet realisateur
        $movie->setDirector($director);

        return $movie;
    }

    public function addMovie(){
        $objects =[];

        $actors = $this->actorDao->findAll();
        $genres = $this->genreDao->findAll();
        $realisateurs = $this->realisateurDao->findAll();

        $objects = [$actors, $genres, $realisateurs];
        return $objects;
    }


    public function recordMovie($m, $file){
        
        //récupération des id des acteurs
        $actors = $m['actors'];

        //création de l'objet movie.
        $mov = $this->movieDao->creerObjetFromSql($m);
        $mov->setCoverImage($file['coverimage']['name']);
   

        

        //envoi de l'objet movie au DAO
        $movie = $this->movieDao->recordMovie($mov,$actors,$file);
    }
}

?>