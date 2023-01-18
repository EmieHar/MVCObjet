<?php

 namespace Emili\MvcObjet\MvcObjet2\Models\Entities;

class Actor{

    private $id;
    private $firstname;
    private $lastname;

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id=NULL)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getFirstname() : string
    {
        return $this->firstname;
    }
    
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    
    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
}

?>