<?php

namespace App\Entity;

use App\Repository\InterviewRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InterviewRepository::class)
 */
class Interview
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $interview;

    /**
     * @ORM\ManyToOne(targetEntity=Entreprise::class, inversedBy="interviews")
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity=Groupes::class, inversedBy="interviews")
     */
    private $groupe;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateInterview;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getInterview(): ?string
    {
        return $this->interview;
    }

    public function setInterview(string $interview): self
    {
        $this->interview = $interview;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getGroupe(): ?Groupes
    {
        return $this->groupe;
    }

    public function setGroupe(?Groupes $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getDateInterview(): ?\DateTimeInterface
    {
        return $this->dateInterview;
    }

    public function setDateInterview(?\DateTimeInterface $dateInterview): self
    {
        $this->dateInterview = $dateInterview;

        return $this;
    }
}
