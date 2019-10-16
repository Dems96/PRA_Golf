<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GolfRepository")
 */
class Golf
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Competition", mappedBy="golf")
     */
    private $competition;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trou", mappedBy="golf")
     */
    private $trous;

    public function __construct()
    {
        $this->competition = new ArrayCollection();
        $this->trous = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Competition[]
     */
    public function getCompetition(): Collection
    {
        return $this->competition;
    }

    public function addCompetition(Competition $competition): self
    {
        if (!$this->competition->contains($competition)) {
            $this->competition[] = $competition;
            $competition->setGolf($this);
        }

        return $this;
    }

    public function removeCompetition(Competition $competition): self
    {
        if ($this->competition->contains($competition)) {
            $this->competition->removeElement($competition);
            // set the owning side to null (unless already changed)
            if ($competition->getGolf() === $this) {
                $competition->setGolf(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Trou[]
     */
    public function getTrous(): Collection
    {
        return $this->trous;
    }

    public function addTrous(Trou $trous): self
    {
        if (!$this->trous->contains($trous)) {
            $this->trous[] = $trous;
            $trous->setGolf($this);
        }

        return $this;
    }

    public function removeTrous(Trou $trous): self
    {
        if ($this->trous->contains($trous)) {
            $this->trous->removeElement($trous);
            // set the owning side to null (unless already changed)
            if ($trous->getGolf() === $this) {
                $trous->setGolf(null);
            }
        }

        return $this;
    }
}
