<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Korisnik
 *
 * @ORM\Table(name="korisnik", indexes={@ORM\Index(name="Korisnik_Uloga", columns={"Uloga_id_uloga"})})
 * @ORM\Entity
 */
class Korisnik
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_korisnik", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idKorisnik;

    /**
     * @var string
     *
     * @ORM\Column(name="ime", type="string", length=50, nullable=false)
     */
    private $ime;

    /**
     * @var string
     *
     * @ORM\Column(name="prezime", type="string", length=50, nullable=false)
     */
    private $prezime;

    /**
     * @var int
     *
     * @ORM\Column(name="Uloga_id_uloga", type="integer", nullable=false)
     */
    private $ulogaIdUloga;

    public function getIdKorisnik(): ?int
    {
        return $this->idKorisnik;
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

    public function getUlogaIdUloga(): ?int
    {
        return $this->ulogaIdUloga;
    }

    public function setUlogaIdUloga(int $ulogaIdUloga): self
    {
        $this->ulogaIdUloga = $ulogaIdUloga;

        return $this;
    }


}
