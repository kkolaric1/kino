<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projekcija
 *
 * @ORM\Table(name="projekcija", indexes={@ORM\Index(name="Projekcije_Filmovi", columns={"Filmovi_id_film"}), @ORM\Index(name="Projekcije_Dvorane", columns={"Dvorane_id_dvorana"})})
 * @ORM\Entity
 */
class Projekcija
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_projekcija", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProjekcija;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vrijeme", type="datetime", nullable=false)
     */
    private $vrijeme;

    /**
     * @var int
     *
     * @ORM\Column(name="broj_karata", type="integer", nullable=false)
     */
    private $brojKarata;

    /**
     * @var int
     *
     * @ORM\Column(name="Filmovi_id_film", type="integer", nullable=false)
     */
    private $filmoviIdFilm;

    /**
     * @var int
     *
     * @ORM\Column(name="Dvorane_id_dvorana", type="integer", nullable=false)
     */
    private $dvoraneIdDvorana;

    public function getIdProjekcija(): ?int
    {
        return $this->idProjekcija;
    }

    public function getVrijeme(): ?\DateTimeInterface
    {
        return $this->vrijeme;
    }

    public function setVrijeme(\DateTimeInterface $vrijeme): self
    {
        $this->vrijeme = $vrijeme;

        return $this;
    }

    public function getBrojKarata(): ?int
    {
        return $this->brojKarata;
    }

    public function setBrojKarata(int $brojKarata): self
    {
        $this->brojKarata = $brojKarata;

        return $this;
    }

    public function getFilmoviIdFilm(): ?int
    {
        return $this->filmoviIdFilm;
    }

    public function setFilmoviIdFilm(int $filmoviIdFilm): self
    {
        $this->filmoviIdFilm = $filmoviIdFilm;

        return $this;
    }

    public function getDvoraneIdDvorana(): ?int
    {
        return $this->dvoraneIdDvorana;
    }

    public function setDvoraneIdDvorana(int $dvoraneIdDvorana): self
    {
        $this->dvoraneIdDvorana = $dvoraneIdDvorana;

        return $this;
    }


}
