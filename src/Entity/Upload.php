<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UploadRepository")
 */
class Upload
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $heureD;

    /**
     * @ORM\Column(type="integer")
     */
    private $TempsD;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeureD(): ?int
    {
        return $this->heureD;
    }

    public function setHeureD(int $heureD): self
    {
        $this->heureD = $heureD;

        return $this;
    }

    public function getTempsD(): ?int
    {
        return $this->TempsD;
    }

    public function setTempsD(int $TempsD): self
    {
        $this->TempsD = $TempsD;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
