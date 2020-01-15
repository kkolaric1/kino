<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Osoba
 *
 * @ORM\Table(name="osoba", indexes={@ORM\Index(name="Uloga_Produkcijska_uloga", columns={"Produkcijska_uloga_id_produkcijskauloga"})})
 * @ORM\Entity
 */
class Osoba
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_osoba", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOsoba;

    /**
     * @var string
     *
     * @ORM\Column(name="ime", type="string", length=30, nullable=false)
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="prezime", type="string", length=30, nullable=false)
     */
    private $prezime;

    /**
     * @var int
     *
     * @ORM\Column(name="Produkcijska_uloga_id_produkcijskauloga", type="integer", nullable=false)
     */
    private $produkcijskaUlogaIdProdukcijskauloga;

    public function getIdOsoba(): ?int
    {
        return $this->idOsoba;
    }

    public function getIme(): ?string
    {
        return $this->ime;
    }

    public function setIme(string $ime): self
    {
        $this->ime = $ime;

        return $this;
    }

    public function getPrezime(): ?string
    {
        return $this->prezime;
    }

    public function setPrezime(string $prezime): self
    {
        $this->prezime = $prezime;

        return $this;
    }

    public function getProdukcijskaUlogaIdProdukcijskauloga(): ?int
    {
        return $this->produkcijskaUlogaIdProdukcijskauloga;
    }

    public function setProdukcijskaUlogaIdProdukcijskauloga(int $produkcijskaUlogaIdProdukcijskauloga): self
    {
        $this->produkcijskaUlogaIdProdukcijskauloga = $produkcijskaUlogaIdProdukcijskauloga;

        return $this;
    }


}
