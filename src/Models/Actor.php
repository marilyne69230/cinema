<?php

namespace App\Models;

class Actor
{
    private int $id;

    private ?string $firstName;

    private string $lastName;

    public function getId(): int
    {
        return $this->id;
    } // on fait pas de set car on pet pas modifier la valeur d'un id 

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
}