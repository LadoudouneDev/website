<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article", mappedBy="fkCategorie")
     * @ORM\OrderBy({"date_parution" = "DESC", "id" = "DESC"})
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

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

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        $lesarticles = $this->articles;

        // foreach($lesarticles as $k => $v) {
        //     dump($v->$this['date_parution'][0]);
        //     $d[$k] = $v->$this.date_parution;
        //  }
        //  array_multisort($d, SORT_DESC, $lesarticles);
        

        return $lesarticles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->addFkCategorie($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            $article->removeFkCategorie($this);
        }

        return $this;
    }
    public function __toString()
    {
        return (string) $this->id;
    }
}
