<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducacionSuperior
 *
 * @ORM\Table(name="educacion_superior", indexes={@ORM\Index(name="IDX_386362A125C485AE", columns={"id_titulo_academico"}), @ORM\Index(name="IDX_386362A18F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class EducacionSuperior
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria para tabla que relaciona usuario con listado profesiones"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="educacion_superior_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_semestre_aprobados", type="integer", nullable=true, options={"comment"="En caso de haber finalizado sus estudios superiores, indica la cantidad de semestres cursados, campo de tipo numérico"})
     */
    private $numeroSemestreAprobados;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="graduado", type="boolean", nullable=true, options={"comment"="variable booleana que indica si logro o no el grado en dicha profesión"})
     */
    private $graduado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_grado", type="date", nullable=true, options={"comment"="fecha en a que recibió el grado del tipo aaaa-mm-dd"})
     */
    private $fechaGrado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_expedicion_tarjeta_profesional", type="date", nullable=true)
     */
    private $fechaExpedicionTarjetaProfesional;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_vencimiento_tarjeta_profesional", type="date", nullable=true, options={"comment"="Si aplica fecha de vencimiento, registrarla"})
     */
    private $fechaVencimientoTarjetaProfesional;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_tarjeta_profesional", type="text", nullable=true, options={"comment"="número de la tarjeta profesional otorgado por la entidad reguladora"})
     */
    private $numeroTarjetaProfesional;

    /**
     * @var \TituloAcademico
     *
     * @ORM\ManyToOne(targetEntity="TituloAcademico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_titulo_academico", referencedColumnName="id")
     * })
     */
    private $idTituloAcademico;

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

    public function getNumeroSemestreAprobados(): ?int
    {
        return $this->numeroSemestreAprobados;
    }

    public function setNumeroSemestreAprobados(?int $numeroSemestreAprobados): self
    {
        $this->numeroSemestreAprobados = $numeroSemestreAprobados;

        return $this;
    }

    public function getGraduado(): ?bool
    {
        return $this->graduado;
    }

    public function setGraduado(?bool $graduado): self
    {
        $this->graduado = $graduado;

        return $this;
    }

    public function getFechaGrado(): ?\DateTimeInterface
    {
        return $this->fechaGrado;
    }

    public function setFechaGrado(?\DateTimeInterface $fechaGrado): self
    {
        $this->fechaGrado = $fechaGrado;

        return $this;
    }

    public function getFechaExpedicionTarjetaProfesional(): ?\DateTimeInterface
    {
        return $this->fechaExpedicionTarjetaProfesional;
    }

    public function setFechaExpedicionTarjetaProfesional(?\DateTimeInterface $fechaExpedicionTarjetaProfesional): self
    {
        $this->fechaExpedicionTarjetaProfesional = $fechaExpedicionTarjetaProfesional;

        return $this;
    }

    public function getFechaVencimientoTarjetaProfesional(): ?\DateTimeInterface
    {
        return $this->fechaVencimientoTarjetaProfesional;
    }

    public function setFechaVencimientoTarjetaProfesional(?\DateTimeInterface $fechaVencimientoTarjetaProfesional): self
    {
        $this->fechaVencimientoTarjetaProfesional = $fechaVencimientoTarjetaProfesional;

        return $this;
    }

    public function getNumeroTarjetaProfesional(): ?string
    {
        return $this->numeroTarjetaProfesional;
    }

    public function setNumeroTarjetaProfesional(?string $numeroTarjetaProfesional): self
    {
        $this->numeroTarjetaProfesional = $numeroTarjetaProfesional;

        return $this;
    }

    public function getIdTituloAcademico(): ?TituloAcademico
    {
        return $this->idTituloAcademico;
    }

    public function setIdTituloAcademico(?TituloAcademico $idTituloAcademico): self
    {
        $this->idTituloAcademico = $idTituloAcademico;

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
