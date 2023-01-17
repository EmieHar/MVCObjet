<?php
namespace Emili\MvcObjet\Models\Entities;

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
    
    public function setId(int $id)
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

    public function getCoverimage(): string
    {
        return $this->coverImage;
    }

    public function setCoverImage(string $coverImage)
    {
        $this->coverImage = $coverImage;
        return $this;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre)
    {
        $this->genre = $genre;
        return $this;
    }

    public function getActors(): string
    {
        return $this->actors;
    }

    public function setActors(string $actors)
    {
        $this->actors = $actors;
        return $this;
    }

    public function getRealisateur(): string
    {
        return $this->director;
    }

    public function setRealisateur(string $director)
    {
        $this->director = $director;
        return $this;
    }
}
?>