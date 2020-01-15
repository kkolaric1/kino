<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FilmOsoba
 *
 * @ORM\Table(name="film_osoba", indexes={@ORM\Index(name="Film_uloga_Uloga", columns={"Uloga_id_osoba"})})
 * @ORM\Entity
 */
class FilmOsoba
{
    /**
     * @var int
     *
     * @ORM\Column(name="Filmovi_id_film", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $filmoviIdFilm;

    /**
     * @var int
     *
     * @ORM\Column(name="Uloga_id_osoba", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ulogaIdOsoba;

    public function getFilmoviIdFilm(): ?int
    {
        return $this->filmoviIdFilm;
    }

    public function getUlogaIdOsoba(): ?int
    {
        return $this->ulogaIdOsoba;
    }


}
