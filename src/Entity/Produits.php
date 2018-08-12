<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits //
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $categories;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $public;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $collections;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DetailsPanier", mappedBy="produits")
     */
    private $detailsPaniers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="produits")
     */
    private $commentaires;

    public function __construct()
    {
        $this->detailsPaniers = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
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

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(string $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPublic(): ?string
    {
        return $this->public;
    }

    public function setPublic(string $public): self
    {
        $this->public = $public;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(?string $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCollections(): ?string
    {
        return $this->collections;
    }

    public function setCollections(string $collections): self
    {
        $this->collections = $collections;

        return $this;
    }

    /**
     * @return Collection|DetailsPanier[]
     */
    public function getDetailsPaniers(): Collection
    {
        return $this->detailsPaniers;
    }

    public function addDetailsPanier(DetailsPanier $detailsPanier): self
    {
        if (!$this->detailsPaniers->contains($detailsPanier)) {
            $this->detailsPaniers[] = $detailsPanier;
            $detailsPanier->addProduit($this);
        }

        return $this;
    }

    public function removeDetailsPanier(DetailsPanier $detailsPanier): self
    {
        if ($this->detailsPaniers->contains($detailsPanier)) {
            $this->detailsPaniers->removeElement($detailsPanier);
            $detailsPanier->removeProduit($this);
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setProduits($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getProduits() === $this) {
                $commentaire->setProduits(null);
            }
        }

        return $this;
    }
}