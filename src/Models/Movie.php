<?php

namespace App\Models;

use DateTime;

class Movie
{
    private int $id;

    private string $title;

    private DateTime $releaseDate;

    private array $actors = [];

    // recuperer l'id
    public function getId(): int
    {
        return $this->id;
    }

    // recuperer le titre
    public function getTitle(): string
    {
        return $this->title;
    }

    // modifier le titre
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // recuperer la date de sortie
    public function getReleaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    // modife la date de sortie
    public function setReleaseDate(DateTime $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getActors(): array
    {
        return $this->actors;
    }

    public function setActors(array $actors): void
    {
        $this->actors = $actors;
    }

    // ajouter un actor 
    public function addActor(Actor $actor): void
    {
        $this->actors[] = $actor;
    }

    // supprimer un actor
    public function removeActor(Actor $actor): void
    {
        if(array_search($actor, $this->actors) === true){
            unset ($this->actors, $actor);
        }
    }
}