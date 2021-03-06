<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entidad
 *
 * @ORM\Table(name="entidad", indexes={@ORM\Index(name="IDX_4587B0CB75BFE419", columns={"id_tipo_entidad"})})
 * @ORM\Entity
 */
class Entidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entidad_id_seq", allocationSize=1, initialValue=1)
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
     * @var \TipoEntidad
     *
     * @ORM\ManyToOne(targetEntity="TipoEntidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_entidad", referencedColumnName="id")
     * })
     */
    private $idTipoEntidad;

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

    public function getIdTipoEntidad(): ?TipoEntidad
    {
        return $this->idTipoEntidad;
    }

    public function setIdTipoEntidad(?TipoEntidad $idTipoEntidad): self
    {
        $this->idTipoEntidad = $idTipoEntidad;

        return $this;
    }

    /**
     * Get display name
     *
     * @return String
     */
    public function __toString()
    {
        if ($this->getIdTipoEntidad() == null){
        return $this->getNombre();
        }
        else {
            return $this->getNombre() . '/' . $this->getIdTipoEntidad()->__toString();
        }
    }
    
}
