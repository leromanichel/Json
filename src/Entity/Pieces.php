<?php

namespace App\Entity;

use App\Repository\PiecesRepository;
use Doctrine\ORM\Mapping as ORM;
use APiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PiecesRepository::class)
 * @ApiResource(
 *      normalizationContext={"groups"={"pieces:read"}},
 *      denormalizationContext={"groups"={"pieces:write"}}
 * )
 */
class Pieces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"pieces:read", "pieces:write","building:read","building:write","organization:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"pieces:read", "pieces:write","building:read","building:write","organization:read"})
     */
    private $nbPersonIn;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"pieces:read","building:read","organization:read"})
     */
    private $nbPersonCapacity;

    /**
     * @ORM\ManyToOne(targetEntity=Building::class, inversedBy="pieces")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"pieces:read", "pieces:write"})
     */
    private $building;
    public function __construct()
    {
        $this->nbPersonCapacity = 0;
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

    public function getNbPersonIn(): ?int
    {
        return $this->nbPersonIn;
    }

    public function setNbPersonIn(int $nbPersonIn): self
    {
        $this->nbPersonIn = $nbPersonIn;

        return $this;
    }

    public function getNbPersonCapacity(): ?int
    {
        return $this->nbPersonCapacity;
    }

    public function setNbPersonCapacity(int $nbPersonCapacity): self
    {
        $this->nbPersonCapacity = $nbPersonCapacity;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): self
    {
        $this->building = $building;

        return $this;
    }
}
