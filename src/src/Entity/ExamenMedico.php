<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExamenMedico
 *
 * @ORM\Table(name="examen_medico", indexes={@ORM\Index(name="IDX_882C12E8B1320DF", columns={"id_tipo_examen_medico"}), @ORM\Index(name="IDX_882C12E671B831A", columns={"id_tipo_programa_examen_medico"}), @ORM\Index(name="IDX_882C12EE46BC38", columns={"id_concepto_examen_medico"}), @ORM\Index(name="IDX_882C12E8F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class ExamenMedico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="examen_medico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var string|null
     *
     * @ORM\Column(name="recomendaciones", type="text", nullable=true)
     */
    private $recomendaciones;

    /**
     * @var \TipoExamenMedico
     *
     * @ORM\ManyToOne(targetEntity="TipoExamenMedico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_examen_medico", referencedColumnName="id")
     * })
     */
    private $idTipoExamenMedico;

    /**
     * @var \TipoProgramaExamenMedico
     *
     * @ORM\ManyToOne(targetEntity="TipoProgramaExamenMedico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_programa_examen_medico", referencedColumnName="id")
     * })
     */
    private $idTipoProgramaExamenMedico;

    /**
     * @var \ConceptoExamenMedico
     *
     * @ORM\ManyToOne(targetEntity="ConceptoExamenMedico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_concepto_examen_medico", referencedColumnName="id")
     * })
     */
    private $idConceptoExamenMedico;

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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getRecomendaciones(): ?string
    {
        return $this->recomendaciones;
    }

    public function setRecomendaciones(?string $recomendaciones): self
    {
        $this->recomendaciones = $recomendaciones;

        return $this;
    }

    public function getIdTipoExamenMedico(): ?TipoExamenMedico
    {
        return $this->idTipoExamenMedico;
    }

    public function setIdTipoExamenMedico(?TipoExamenMedico $idTipoExamenMedico): self
    {
        $this->idTipoExamenMedico = $idTipoExamenMedico;

        return $this;
    }

    public function getIdTipoProgramaExamenMedico(): ?TipoProgramaExamenMedico
    {
        return $this->idTipoProgramaExamenMedico;
    }

    public function setIdTipoProgramaExamenMedico(?TipoProgramaExamenMedico $idTipoProgramaExamenMedico): self
    {
        $this->idTipoProgramaExamenMedico = $idTipoProgramaExamenMedico;

        return $this;
    }

    public function getIdConceptoExamenMedico(): ?ConceptoExamenMedico
    {
        return $this->idConceptoExamenMedico;
    }

    public function setIdConceptoExamenMedico(?ConceptoExamenMedico $idConceptoExamenMedico): self
    {
        $this->idConceptoExamenMedico = $idConceptoExamenMedico;

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

    /**
     * Get display name
     *
     * @return String
     */
    public function __toString()
    {
        return (string)$this->getId();
    }
    
}
