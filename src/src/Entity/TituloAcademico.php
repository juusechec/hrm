<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TituloAcademico
 *
 * @ORM\Table(name="titulo_academico")
 * @ORM\Entity
 */
class TituloAcademico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria de las profesiones"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titulo_academico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre de la profesión"})
     */
    private $nombre;

    /**
     * @var int|null
     *
     * @ORM\Column(name="codigo_snies", type="integer", nullable=true, options={"comment"="Código de la profesión según el ministerio de educación nacional"})
     */
    private $codigoSnies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modalidad_academica", type="text", nullable=true, options={"comment"="modalidad como presencial, virtual, etc."})
     */
    private $modalidadAcademica;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="descripción, y área de aplicación de la carrera"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="abreviatura para la profesión tamaño del campo de tres caracteres"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="campo tipo entero donde se organiza el orden de visualización"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCodigoSnies(): ?int
    {
        return $this->codigoSnies;
    }

    public function setCodigoSnies(?int $codigoSnies): self
    {
        $this->codigoSnies = $codigoSnies;

        return $this;
    }

    public function getModalidadAcademica(): ?string
    {
        return $this->modalidadAcademica;
    }

    public function setModalidadAcademica(?string $modalidadAcademica): self
    {
        $this->modalidadAcademica = $modalidadAcademica;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getAbreviacion(): ?string
    {
        return $this->abreviacion;
    }

    public function setAbreviacion(?string $abreviacion): self
    {
        $this->abreviacion = $abreviacion;

        return $this;
    }

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(?int $orden): self
    {
        $this->orden = $orden;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(?bool $activo): self
    {
        $this->activo = $activo;

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
