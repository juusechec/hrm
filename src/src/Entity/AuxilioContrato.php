<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuxilioContrato
 *
 * @ORM\Table(name="auxilio_contrato", indexes={@ORM\Index(name="IDX_9694AC85E2FFD49E", columns={"id_tipo_auxilio_contrato"}), @ORM\Index(name="IDX_9694AC8536B289B6", columns={"id_contrato"})})
 * @ORM\Entity
 */
class AuxilioContrato
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="ID de la tabla de auxilios"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="auxilio_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true, options={"comment"="Fecha en que se da el auxilio"})
     */
    private $fecha;

    /**
     * @var \TipoAuxilioContrato
     *
     * @ORM\ManyToOne(targetEntity="TipoAuxilioContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_auxilio_contrato", referencedColumnName="id")
     * })
     */
    private $idTipoAuxilioContrato;

    /**
     * @var \Contrato
     *
     * @ORM\ManyToOne(targetEntity="Contrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contrato", referencedColumnName="id")
     * })
     */
    private $idContrato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getIdTipoAuxilioContrato(): ?TipoAuxilioContrato
    {
        return $this->idTipoAuxilioContrato;
    }

    public function setIdTipoAuxilioContrato(?TipoAuxilioContrato $idTipoAuxilioContrato): self
    {
        $this->idTipoAuxilioContrato = $idTipoAuxilioContrato;

        return $this;
    }

    public function getIdContrato(): ?Contrato
    {
        return $this->idContrato;
    }

    public function setIdContrato(?Contrato $idContrato): self
    {
        $this->idContrato = $idContrato;

        return $this;
    }


}
