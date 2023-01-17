<?php

 namespace Emili\MvcObjet\MvcObjet1\Models\Entities;

class Realisateur{

    private $id;
    private $prenom;
    private $nom;

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getPrenom() : string
    {
        return $this->prenom;
    }
    
    public function setPrenom(string $prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }
    
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
        return $this;
    }
}