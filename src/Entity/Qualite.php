<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\QualiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
#[ApiResource (
    operations: [
    new Get(),
    new GetCollection()]
//       , normalizationContext: ['groups' => ['qualite:item', 'qualite:list']],
//    denormalizationContext: ['groups' => ['qualite:item', 'qualite:list']]
        )
]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['qualite:list', 'qualite:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['qualite:list', 'qualite:item'])]
    private ?string $libellequalite = null;

//    #[ORM\OneToMany(targetEntity: Licencie::class, mappedBy: 'idqualite')]
//    #[Groups(['qualite:list', 'qualite:item'])]
//    private Collection $licencies;

    public function __construct()
    {
//        $this->licencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellequalite(): ?string
    {
        return $this->libellequalite;
    }

    public function setLibellequalite(string $libellequalite): static
    {
        $this->libellequalite = $libellequalite;

        return $this;
    }

}
