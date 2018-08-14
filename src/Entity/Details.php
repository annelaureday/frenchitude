<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DetailsRepository")
 */
class Details
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $quantite;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_ttc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Panier", inversedBy="details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $panier_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produits", inversedBy="details")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produits_id;

    public function getId()
    {
        return $this->id;
    }

    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    public function setQuantite(?string $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getMontantTtc(): ?float
    {
        return $this->montant_ttc;
    }

    public function setMontantTtc(float $montant_ttc): self
    {
        $this->montant_ttc = $montant_ttc;

        return $this;
    }

    public function getPanierId(): ?Panier
    {
        return $this->panier_id;
    }

    public function setPanierId(?Panier $panier_id): self
    {
        $this->panier_id = $panier_id;

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
}
