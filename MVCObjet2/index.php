<?php

require_once 'vendor/autoload.php';//autoload géré par composer.json

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader( __DIR__ . '/src/View');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

use  Emili\MvcObjet\MvcObjet2\controllers\ActorController; 
use  Emili\MvcObjet\MvcObjet2\controllers\GenreController; 
use Emili\MvcObjet\MvcObjet2\controllers\RealisateurController;
use Emili\MvcObjet\MvcObjet2\controllers\MovieController; 

$actorController = new ActorController($twig);

// $actorController = new ActorController();
$genreController = new GenreController();
$realisateurController = new RealisateurController();
$movieController = new MovieController($twig);

$base  = dirname($_SERVER['PHP_SELF']);

if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$route = new \Klein\Klein();

$route->respond('GET','/acteurs', function() use ($actorController) {
   $actorController->ListeActeurs();
//    echo "<pre>";
//    print_r ($la);
//    echo "</pre>";
    
});


$route->respond('GET','/acteurs/[:id]', function($req,$res) use ($actorController){
    $actor = $actorController->get1Acteur($req->id);
    // echo "<pre>";
    // print_r ($actor);
    // echo "</pre>";
});

$route->respond('GET','/genres', function() use ($genreController){
    $lg = $genreController->ListeGenres();
    echo "<pre>";
    print_r ($lg);
    echo "</pre>";
});

$route->respond('GET','/genres/[:id]', function($req,$res) use ($genreController){
 $genre = $genreController->get1Genre($req->id);
    echo "<pre>";
    print_r ($genre);
    echo "</pre>";
});

$route->respond('GET','/realisateurs', function() use ($realisateurController){
    $lr = $realisateurController->ListeRealisateurs();
    echo "<pre>";
    print_r ($lr);
    echo "</pre>";
});

$route->respond('GET','/realisateurs/[:id]', function($req,$res) use ($realisateurController){
 $realisateur = $realisateurController->get1Realisateur($req->id);
    echo "<pre>";
    print_r ($realisateur);
    echo "</pre>";
});

$route->respond('GET','/movies', function() use ($movieController){
    $lm = $movieController->ListeMovies();
    echo "<pre>";
    print_r ($lm);
    echo "</pre>";
});

$route->respond('GET','/movies/[:id]', function($req,$res) use ($movieController){
 $movie = $movieController->get1Movie($req->id);
    echo "<pre>";
    print_r ($movie);
    echo "</pre>";
});

$route->respond('GET','/addactor', function() use ($actorController){
    $actorController ->addActor();//affichage d'un formulaire pour ajout acteur
});

$route->respond('POST','/recordactor', function($req) use ($actorController){
    $actorController->recordActor($req->paramsPost());//ajout acteur
});

$route->respond('GET','/addmovie', function() use ($movieController){
    $movieController ->addMovie();//affichage d'un formulaire pour ajouter 1 film
});

$route->respond('POST','/recordmovie', function($req) use ($movieController){
    $file = $req->files()->all();
    $movieController->recordMovie($req->paramsPost(),$file);//ajout film
});

$route->dispatch();
?>