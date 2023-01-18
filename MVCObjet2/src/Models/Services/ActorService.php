<?php

namespace Emili\MvcObjet\MvcObjet2\Models\Services;

use Emili\MvcObjet\MvcObjet2\Models\Daos\ActorDao;

class ActorService {
    private $actorDao;

    public function __construct(){
        $this->actorDao = new ActorDao();
    }

    public function ListeActeurs(){
        $liste = $this->actorDao->findAll();
        return ($liste);
    }

    public function get1Acteur($a){
        $actor = $this->actorDao->findOne($a);
        return $actor;
    }

    public function recordActor($a){
        //création de l'objet acteur.

        $ac = $this->actorDao->creerObjetFromSql($a);

        //envoi de l'objet acteur au DAO
        $acteur = $this->actorDao->recordActor($ac);
    }

 
}

?>