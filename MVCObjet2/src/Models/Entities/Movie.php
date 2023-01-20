<?php
namespace Emili\MvcObjet\MvcObjet2\Models\Entities;

class Movie
{
    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $coverImage;
    private $genre;
    private $director;
    private $actors;

    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id= NULL)
    {
        $this->id = $id;
        return $this;
    }
    
    public function getTitle() : string
    {
        return $this->title;
    }
    
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }
    
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
        return $this;
    }

    public function getDuration(): string
    {
        return $this->duration;
    }

    public function setDuration(string $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function getCoverImage(): string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage)
    {
        $this->coverImage = $coverImage;
        return $this;
    }

    public function addActor(Actor $actor)
    {
         if (is_array($this->actors)){
             foreach ($this->actors as $a) {
                 if ($a->getId() == $actor->getId()) {
                     return;
                 }
             } 
         }
        $this->actors[] = $actor;
        return $this;
    }

    public function getActors(){
        return $this->actors;
    }

    public function setDirector($director)
    {
        $this->director = $director;
        return $this;
    }

    public function getDirector() 
    {
        return $this->director;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }  

    public function getGenre()
    {
        return $this->genre;
    }

    

}
?>