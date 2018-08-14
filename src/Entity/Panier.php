<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier
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
    private $montant;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $statut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_panier;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Livraison", inversedBy="paniers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $livraison_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateurs", inversedBy="panier", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurs_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Details", mappedBy="panier_id", orphanRemoval=true)
     */
    private $details;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Paiement", mappedBy="panier_id")
     */
    private $paiements;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->paiements = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
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

    public function getDatePanier(): ?\DateTimeInterface
    {
        return $this->date_panier;
    }

    public function setDatePanier(\DateTimeInterface $date_panier): self
    {
        $this->date_panier = $date_panier;

        return $this;
    }

    public function getLivraisonId(): ?Livraison
    {
        return $this->livraison_id;
    }

    public function setLivraisonId(?Livraison $livraison_id): self
    {
        $this->livraison_id = $livraison_id;

        return $this;
    }

    public function getUtilisateursId(): ?Utilisateurs
    {
        return $this->utilisateurs_id;
    }

    public function setUtilisateursId(Utilisateurs $utilisateurs_id): self
    {
        $this->utilisateurs_id = $utilisateurs_id;

        return $this;
    }

    /**
     * @return Collection|Details[]
     */
    public function getDetails(): Collection
    {
        return $this->details;
    }

    public function addDetail(Details $detail): self
    {
        if (!$this->details->contains($detail)) {
            $this->details[] = $detail;
            $detail->setPanierId($this);
        }

        return $this;
    }

    public function removeDetail(Details $detail): self
    {
        if ($this->details->contains($detail)) {
            $this->details->removeElement($detail);
            // set the owning side to null (unless already changed)
            if ($detail->getPanierId() === $this) {
                $detail->setPanierId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->setPanierId($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->contains($paiement)) {
            $this->paiements->removeElement($paiement);
            // set the owning side to null (unless already changed)
            if ($paiement->getPanierId() === $this) {
                $paiement->setPanierId(null);
            }
        }

        return $this;
    }
}
