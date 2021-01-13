<?php

namespace App\Entity;

use App\Repository\TileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TileRepository::class)
 */
class Tile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $room;

    /**
     * @ORM\ManyToMany(targetEntity=Tile::class, inversedBy="tiles")
     */
    private $associatedId;

    /**
     * @ORM\ManyToMany(targetEntity=Tile::class, mappedBy="associatedId")
     */
    private $tiles;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordX;

    /**
     * @ORM\Column(type="integer")
     */
    private $coordY;

    public function __construct()
    {
        $this->associatedId = new ArrayCollection();
        $this->tiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRoom(): ?string
    {
        return $this->room;
    }

    public function setRoom(?string $room): self
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAssociatedId(): Collection
    {
        return $this->associatedId;
    }

    public function addAssociatedId(self $associatedId): self
    {
        if (!$this->associatedId->contains($associatedId)) {
            $this->associatedId[] = $associatedId;
        }

        return $this;
    }

    public function removeAssociatedId(self $associatedId): self
    {
        $this->associatedId->removeElement($associatedId);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getTiles(): Collection
    {
        return $this->tiles;
    }

    public function addTile(self $tile): self
    {
        if (!$this->tiles->contains($tile)) {
            $this->tiles[] = $tile;
            $tile->addAssociatedId($this);
        }

        return $this;
    }

    public function removeTile(self $tile): self
    {
        if ($this->tiles->removeElement($tile)) {
            $tile->removeAssociatedId($this);
        }

        return $this;
    }

    public function getCoordX(): ?int
    {
        return $this->coordX;
    }

    public function setCoordX(int $coordX): self
    {
        $this->coordX = $coordX;

        return $this;
    }

    public function getCoordY(): ?int
    {
        return $this->coordY;
    }

    public function setCoordY(int $coordY): self
    {
        $this->coordY = $coordY;

        return $this;
    }
}
