<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zanr
 *
 * @ORM\Table(name="zanr")
 * @ORM\Entity
 */
class Zanr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_zanr", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idZanr;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=30, nullable=false)
     */
    private $naziv;

    public function getIdZanr(): ?int
    {
        return $this->idZanr;
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
