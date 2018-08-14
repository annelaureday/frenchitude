<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
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
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_paiement;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $ref_ordre;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Panier", inversedBy="paiements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $panier_id;

    public function getId()
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->date_paiement;
    }

    public function setDatePaiement(\DateTimeInterface $date_paiement): self
    {
        $this->date_paiement = $date_paiement;

        return $this;
    }

    public function getRefOrdre(): ?string
    {
        return $this->ref_ordre;
    }

    public function setRefOrdre(string $ref_ordre): self
    {
        $this->ref_ordre = $ref_ordre;

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
}
