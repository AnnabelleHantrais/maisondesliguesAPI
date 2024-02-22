<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
#[ApiResource (
    operations: [
    new Get(),
    new GetCollection()])
    ]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['club:list', 'club:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $nom = null;

    #[ORM\Column(length: 60)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 60, nullable: true)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 5)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $cp = null;

    #[ORM\Column(length: 60)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $ville = null;

    #[ORM\Column(length: 14)]
    #[Groups(['club:list', 'club:item'])]
    private ?string $tel = null;

//    #[ORM\OneToMany(targetEntity: Licencie::class, mappedBy: 'idclub')]
//    #[Groups(['licencie:list', 'licencie:item'])]
//    private Collection $licencies;

    public function __construct()
    {
//        $this->licencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): static
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): static
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

//    /**
//     * @return Collection<int, Licencie>
//     */
//    public function getLicencies(): Collection
//    {
//        return $this->licencies;
//    }

//    public function addLicency(Licencie $licency): static
//    {
//        if (!$this->licencies->contains($licency)) {
//            $this->licencies->add($licency);
//            $licency->setIdclub($this);
//        }
//
//        return $this;
//    }
//
//    public function removeLicency(Licencie $licency): static
//    {
//        if ($this->licencies->removeElement($licency)) {
//            // set the owning side to null (unless already changed)
//            if ($licency->getIdclub() === $this) {
//                $licency->setIdclub(null);
//            }
//        }
//
//        return $this;
//    }
}
