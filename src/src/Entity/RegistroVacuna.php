<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroVacuna
 *
 * @ORM\Table(name="registro_vacuna", indexes={@ORM\Index(name="IDX_EE26879B8F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_EE26879BFF22CFDC", columns={"id_tipo_vacuna"})})
 * @ORM\Entity
 */
class RegistroVacuna
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria,  registro de la vacunación"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="registro_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_dosis", type="date", nullable=true, options={"comment"="fecha en la que se aplico la dosis"})
     */
    private $fechaDosis;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fecha_vencimiento_dosis", type="smallint", nullable=true)
     */
    private $fechaVencimientoDosis;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    /**
     * @var \TipoVacuna
     *
     * @ORM\ManyToOne(targetEntity="TipoVacuna")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_vacuna", referencedColumnName="id")
     * })
     */
    private $idTipoVacuna;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaDosis(): ?\DateTimeInterface
    {
        return $this->fechaDosis;
    }

    public function setFechaDosis(?\DateTimeInterface $fechaDosis): self
    {
        $this->fechaDosis = $fechaDosis;

        return $this;
    }

    public function getFechaVencimientoDosis(): ?int
    {
        return $this->fechaVencimientoDosis;
    }

    public function setFechaVencimientoDosis(?int $fechaVencimientoDosis): self
    {
        $this->fechaVencimientoDosis = $fechaVencimientoDosis;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->observacion;
    }

    public function setObservacion(?string $observacion): self
    {
        $this->observacion = $observacion;

        return $this;
    }

    public function getIdPersona(): ?Persona
    {
        return $this->idPersona;
    }

    public function setIdPersona(?Persona $idPersona): self
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    public function getIdTipoVacuna(): ?TipoVacuna
    {
        return $this->idTipoVacuna;
    }

    public function setIdTipoVacuna(?TipoVacuna $idTipoVacuna): self
    {
        $this->idTipoVacuna = $idTipoVacuna;

        return $this;
    }


}
