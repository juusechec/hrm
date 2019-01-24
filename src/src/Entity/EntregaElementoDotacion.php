<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntregaElementoDotacion
 *
 * @ORM\Table(name="entrega_elemento_dotacion", indexes={@ORM\Index(name="IDX_4273978F41694E1F", columns={"id_elemento_dotacion"}), @ORM\Index(name="IDX_4273978F8F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class EntregaElementoDotacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entrega_elemento_dotacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_entrega_dotacion", type="date", nullable=true)
     */
    private $fechaEntregaDotacion;

    /**
     * @var \ElementoDotacion
     *
     * @ORM\ManyToOne(targetEntity="ElementoDotacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_elemento_dotacion", referencedColumnName="id")
     * })
     */
    private $idElementoDotacion;

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

    public function getFechaEntregaDotacion(): ?\DateTimeInterface
    {
        return $this->fechaEntregaDotacion;
    }

    public function setFechaEntregaDotacion(?\DateTimeInterface $fechaEntregaDotacion): self
    {
        $this->fechaEntregaDotacion = $fechaEntregaDotacion;

        return $this;
    }

    public function getIdElementoDotacion(): ?ElementoDotacion
    {
        return $this->idElementoDotacion;
    }

    public function setIdElementoDotacion(?ElementoDotacion $idElementoDotacion): self
    {
        $this->idElementoDotacion = $idElementoDotacion;

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
