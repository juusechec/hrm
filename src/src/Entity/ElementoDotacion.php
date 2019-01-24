<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElementoDotacion
 *
 * @ORM\Table(name="elemento_dotacion", uniqueConstraints={@ORM\UniqueConstraint(name="elemento_dotacion_uq", columns={"id_tipo_elemento_dotacion"})})
 * @ORM\Entity
 */
class ElementoDotacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="elemento_dotacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true)
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true)
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;

    /**
     * @var \TipoElementoDotacion
     *
     * @ORM\ManyToOne(targetEntity="TipoElementoDotacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_elemento_dotacion", referencedColumnName="id")
     * })
     */
    private $idTipoElementoDotacion;

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

    public function getIdTipoElementoDotacion(): ?TipoElementoDotacion
    {
        return $this->idTipoElementoDotacion;
    }

    public function setIdTipoElementoDotacion(?TipoElementoDotacion $idTipoElementoDotacion): self
    {
        $this->idTipoElementoDotacion = $idTipoElementoDotacion;

        return $this;
    }


}
