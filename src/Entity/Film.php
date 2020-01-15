<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film", indexes={@ORM\Index(name="Filmovi_Zanrovi", columns={"Zanrovi_id_zanr"})})
 * @ORM\Entity
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_film", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFilm;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=50, nullable=false)
     */
    private $naziv;

    /**
     * @var int
     *
     * @ORM\Column(name="Zanrovi_id_zanr", type="integer", nullable=false)
     */
    private $zanroviIdZanr;

    /**
     * @var int
     *
     * @ORM\Column(name="trajanje", type="integer", nullable=false)
     */
    private $trajanje;

    public function getIdFilm(): ?int
    {
        return $this->idFilm;
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

    public function getZanroviIdZanr(): ?int
    {
        return $this->zanroviIdZanr;
    }

    public function setZanroviIdZanr(int $zanroviIdZanr): self
    {
        $this->zanroviIdZanr = $zanroviIdZanr;

        return $this;
    }

    public function getTrajanje(): ?int
    {
        return $this->trajanje;
    }

    public function setTrajanje(int $trajanje): self
    {
        $this->trajanje = $trajanje;

        return $this;
    }


}
