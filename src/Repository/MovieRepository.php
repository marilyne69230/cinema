<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;
use PDO;

class MovieRepository
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }


    public function findAll(): array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll();
    }

    public function findFirstMovieToModel(): Movie
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchObject(Movie::class);
    }

    public function findAllMoviesToModel(): array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    public function findOneById(int $id): Movie|bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE id = ?');
        $query->bindValue(1, $id);
        $query->execute();

        return $query->fetchObject(Movie::class);
    }

    public function findByTitle(string $title): array
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $title = '%' . $title . '%';
        $query->bindValue(':title', $title);
        // exécuter la requete
        $query->execute();
        //retourne moi un tableau d'objets
        return $query->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    // fonction pour ajouter un film et qui va renvoyer un film
    public function addMovie(Movie $movie): movie
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title, :release_date)');
        $title = $movie->getTitle();
        $date = $movie->getReleaseDate();
        $releaseDate = $date->format('Y-m-d');
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $releaseDate);
        $query->execute();

        return $movie;
    }

    // ajoute les acteurs au film
    public function addActorsToMovie(Movie $movie): Movie
    {
        $actors = $movie->getActors();
        foreach ($actors as $actor) {
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie_actor VALUE (null, :id_actor, :id_movie)');
            $idActor = $actor->getId();
            $idMovie = $movie->getId();
            $query->bindParam(':id_actor', $idActor);
            $query->bindParam(':id_movie', $idMovie);
            $query->execute();
        }

        return $movie;
    }

    public function deleteMovie(Movie $movie): void
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM movie WHERE id = :id_movie');
        $id = $movie->getId();
        $query->bindParam(':id_movie', $id);
        $query->execute();
    }
}
