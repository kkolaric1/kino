<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dvorana
 *
 * @ORM\Table(name="dvorana")
 * @ORM\Entity
 */
class Dvorana
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dvorana", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDvorana;

    /**
     * @var int
     *
     * @ORM\Column(name="broj_sjedala", type="integer", nullable=false)
     */
    private $brojSjedala;

    /**
     * @var string
     *
     * @ORM\Column(name="naziv", type="string", length=30, nullable=false)
     */
    private $naziv;

    public function getIdDvorana(): ?int
    {
        return $this->idDvorana;
    }

    public function getBrojSjedala(): ?int
    {
        return $this->brojSjedala;
    }

    public function setBrojSjedala(int $brojSjedala): self
    {
        $this->brojSjedala = $brojSjedala;

        return $this;
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
