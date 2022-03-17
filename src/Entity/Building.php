<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use APiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BuildingRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"building:read"}},
 *      denormalizationContext={"groups"={"building:write"}}
 * )
 */

class Building
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"building:read","building:write","pieces:read", "pieces:write", "organization:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"building:read","building:write","pieces:read", "pieces:write","organization:read"})
     */
    private $zipCode;

    /**
     * @ORM\ManyToOne(targetEntity=Organization::class, inversedBy="buildings")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"building:read","building:write","pieces:read", "pieces:write"})
     */
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity=Pieces::class, mappedBy="building")
     * @Groups({"building:read","building:write","organization:read"})
     */
    private $pieces;

    public function __construct()
    {
        $this->pieces = new ArrayCollection();
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

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * @return Collection<int, Pieces>
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Pieces $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->setBuilding($this);
        }

        return $this;
    }

    public function removePiece(Pieces $piece): self
    {
        if ($this->pieces->removeElement($piece)) {
            // set the owning side to null (unless already changed)
            if ($piece->getBuilding() === $this) {
                $piece->setBuilding(null);
            }
        }

        return $this;
    }
}
