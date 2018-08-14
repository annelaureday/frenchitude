<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateurs", inversedBy="commentaires")
     */
    private $utilisateurs_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produits", inversedBy="commentaires")
     */
    private $produits_id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $commentaire;

    public function getId()
    {
        return $this->id;
    }

    public function getUtilisateursId(): ?Utilisateurs
    {
        return $this->utilisateurs_id;
    }

    public function setUtilisateursId(?Utilisateurs $utilisateurs_id): self
    {
        $this->utilisateurs_id = $utilisateurs_id;

        return $this;
    }

    public function getProduitsId(): ?Produits
    {
        return $this->produits_id;
    }

    public function setProduitsId(?Produits $produits_id): self
    {
        $this->produits_id = $produits_id;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}
