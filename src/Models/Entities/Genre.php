<?php

 namespace Emili\MvcObjet\Models\Entities;

class Genre{

    private $id;
    private $name;

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

}

?>