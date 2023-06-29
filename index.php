<?php

// UTILISATION DES CLASS
use App\Repository\ActorRepository;
use App\Repository\MovieRepository;
use App\Models\Movie;
use App\Models\Actor;
// /UTILISATION DES CLASS

include_once __DIR__ . '/vendor/autoload.php';


// affiche moi l'actor dont l'id est le 3
//dump($actorRepository->findOneById(3));


// AJOUT FILM
$movieRepository = new MovieRepository();
// on crée un nouveau film
$taxi = new Movie();
$date = new DateTime();
$date->setDate(1998, 4, 8);
// son nom est Taxi 
$taxi->setTitle('Taxi 1');
// sa date de sortie est ...
$taxi->setReleaseDate($date);
// on affiche le film
dump($taxi);
// on l'ajoute dans phpMyadmin
// $movieRepository->addMovie($taxi);         on le commente pour éviter qu'il s'affiche plusieurs fois dans la BDD
// /AJOUT FILM


// AJOUT ACTOR
$actorRepository = new ActorRepository();
// on crée un nouvel actor
$willSmith = new Actor();
// on lui donne un prenom
$willSmith->setFirstName('Will');
// et un nom
$willSmith->setLastName('Smith');
// on l'ajoute dans la bdd phpmyadmin
//dump($actorRepository->insertActor($willSmith));
// /AJOUT ACTOR


// ASSOCIATION ACTOR ET FILM : on ajoute 2 acteurs au film joker
// on recup un film existant avec l'id 5
$joker = $movieRepository->findOneById(5);
// on recup l'actor avec l'id 1
$brad = $actorRepository->findOneById(1);
// on recup l'actor avec l'id 4
$orland = $actorRepository->findOneById(4);
// on ajoute les 2 actor a notre film
$joker->addActor($brad);
$joker->addActor($orland);
// on affiche le film avec les actor
dump($joker);
// on ajout a la bdd
// $movieRepository->addActorsToMovie($joker);
// /ASSOCIATION ACTOR ET FILM

// SUPPRIMER UNE FILM
$troy = $movieRepository->findOneById(7);
dump($troy);
$movieRepository->deleteMovie($troy);
// /SUPPRIMER UN FILM