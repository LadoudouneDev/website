<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_parution;

    /**
     * @ORM\Column(type="boolean")
     */
    private $publie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categorie", inversedBy="articles")
     */
    private $fkCategorie;

    public function __construct()
    {
        $this->fkCategorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    public function getPublie(): ?bool
    {
        return $this->publie;
    }

    public function setPublie(bool $publie): self
    {
        $this->publie = $publie;

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getFkCategorie(): Collection
    {
        return $this->fkCategorie;
    }

    public function addFkCategorie(Categorie $fkCategorie): self
    {
        if (!$this->fkCategorie->contains($fkCategorie)) {
            $this->fkCategorie[] = $fkCategorie;
        }

        return $this;
    }

    public function removeFkCategorie(Categorie $fkCategorie): self
    {
        if ($this->fkCategorie->contains($fkCategorie)) {
            $this->fkCategorie->removeElement($fkCategorie);
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->id;
    }
}
