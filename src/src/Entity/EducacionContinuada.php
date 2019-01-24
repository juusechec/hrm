<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducacionContinuada
 *
 * @ORM\Table(name="educacion_continuada", indexes={@ORM\Index(name="IDX_227021D3D29ED8F", columns={"id_titulo_educacion_continuada"}), @ORM\Index(name="IDX_227021D38F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class EducacionContinuada
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="educacion_continuada_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_terminacion", type="date", nullable=true)
     */
    private $fechaTerminacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=true)
     */
    private $fechaVencimiento;

    /**
     * @var \TituloEducacionContinuada
     *
     * @ORM\ManyToOne(targetEntity="TituloEducacionContinuada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_titulo_educacion_continuada", referencedColumnName="id")
     * })
     */
    private $idTituloEducacionContinuada;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaTerminacion(): ?\DateTimeInterface
    {
        return $this->fechaTerminacion;
    }

    public function setFechaTerminacion(?\DateTimeInterface $fechaTerminacion): self
    {
        $this->fechaTerminacion = $fechaTerminacion;

        return $this;
    }

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(?\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    public function getIdTituloEducacionContinuada(): ?TituloEducacionContinuada
    {
        return $this->idTituloEducacionContinuada;
    }

    public function setIdTituloEducacionContinuada(?TituloEducacionContinuada $idTituloEducacionContinuada): self
    {
        $this->idTituloEducacionContinuada = $idTituloEducacionContinuada;

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


}
