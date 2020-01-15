<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uloga
 *
 * @ORM\Table(name="uloga")
 * @ORM\Entity
 */
class Uloga
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_uloga", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUloga;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=20, nullable=false)
     */
    private $naziv;

    public function getIdUloga(): ?int
    {
        return $this->idUloga;
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
