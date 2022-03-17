<?php

namespace App\Entity;

use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use APiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OrganizationRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"organization:read"}},
 *      denormalizationContext={"groups"={"organization:write"}}
 * )
 */
class Organization
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"organization:read","building:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"organization:read","organization:write","building:read","building:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Building::class, mappedBy="organization")
     * @Groups({"organization:read"})
     */
    private $buildings;

    public function __construct()
    {
        $this->buildings = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable;
        $this->updatedAt = new \DateTimeImmutable;
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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Building>
     */
    public function getBuildings(): Collection
    {
        return $this->buildings;
    }

    public function addBuilding(Building $building): self
    {
        if (!$this->buildings->contains($building)) {
            $this->buildings[] = $building;
            $building->setOrganization($this);
        }

        return $this;
    }

    public function removeBuilding(Building $building): self
    {
        if ($this->buildings->removeElement($building)) {
            // set the owning side to null (unless already changed)
            if ($building->getOrganization() === $this) {
                $building->setOrganization(null);
            }
        }

        return $this;
    }
}
