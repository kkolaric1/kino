<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjekcijaKorisnik
 *
 * @ORM\Table(name="projekcija_korisnik", indexes={@ORM\Index(name="Projekcije_korisnici_Korisnik", columns={"Korisnik_id_korisnik"})})
 * @ORM\Entity
 */
class ProjekcijaKorisnik
{
    /**
     * @var int
     *
     * @ORM\Column(name="Projekcije_id_projekcija", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $projekcijeIdProjekcija;

    /**
     * @var int
     *
     * @ORM\Column(name="Korisnik_id_korisnik", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $korisnikIdKorisnik;

    public function getProjekcijeIdProjekcija(): ?int
    {
        return $this->projekcijeIdProjekcija;
    }

    public function getKorisnikIdKorisnik(): ?int
    {
        return $this->korisnikIdKorisnik;
    }


}
