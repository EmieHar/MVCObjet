<?php

namespace Emili\MvcObjet\Models\Services;

use Emili\MvcObjet\Models\Daos\ActorDao;

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
}

?>