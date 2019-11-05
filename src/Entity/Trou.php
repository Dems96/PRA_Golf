<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrouRepository")
 */
class Trou
{

    private $id;
    private $HeureD;
    private $TempsD;

    /**
     * @return mixed
     */
    public function getTempsD()
    {
        return $this->TempsD;
    }

    /**
     * @param mixed $TempsD
     */
    public function setTempsD($TempsD): int
    {
        $this->TempsD = $TempsD;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureD(): ?int
    {
        return $this->HeureD;
    }

    public function setHeureD($HeureD): self
    {
        $this->HeureD = $HeureD;

        return $this;
    }
}
