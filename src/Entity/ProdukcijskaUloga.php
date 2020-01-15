<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdukcijskaUloga
 *
 * @ORM\Table(name="produkcijska_uloga")
 * @ORM\Entity
 */
class ProdukcijskaUloga
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produkcijskauloga", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProdukcijskauloga;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    public function getIdProdukcijskauloga(): ?int
    {
        return $this->idProdukcijskauloga;
    }

    public function getNaziv(): ?string
    {
        return $this->naziv;
    }

    public function setNaziv(string $naziv): self
    {
        $this->naziv = $naziv;

        return $this;
    }


}
