<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vivienda
 *
 * @ORM\Table(name="vivienda", indexes={@ORM\Index(name="IDX_2DFFABDE45122072", columns={"id_tipo_vivienda"}), @ORM\Index(name="IDX_2DFFABDE8F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class Vivienda
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="vivienda_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="direccion", type="text", nullable=true)
     */
    private $direccion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="barrio", type="text", nullable=true)
     */
    private $barrio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="estrato", type="integer", nullable=true)
     */
    private $estrato;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pais", type="integer", nullable=true)
     */
    private $pais;

    /**
     * @var int|null
     *
     * @ORM\Column(name="departamento", type="integer", nullable=true)
     */
    private $departamento;

    /**
     * @var int|null
     *
     * @ORM\Column(name="municipio", type="integer", nullable=true)
     */
    private $municipio;

    /**
     * @var \TipoVivienda
     *
     * @ORM\ManyToOne(targetEntity="TipoVivienda")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_vivienda", referencedColumnName="id")
     * })
     */
    private $idTipoVivienda;

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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getBarrio(): ?string
    {
        return $this->barrio;
    }

    public function setBarrio(?string $barrio): self
    {
        $this->barrio = $barrio;

        return $this;
    }

    public function getEstrato(): ?int
    {
        return $this->estrato;
    }

    public function setEstrato(?int $estrato): self
    {
        $this->estrato = $estrato;

        return $this;
    }

    public function getPais(): ?int
    {
        return $this->pais;
    }

    public function setPais(?int $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getDepartamento(): ?int
    {
        return $this->departamento;
    }

    public function setDepartamento(?int $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getMunicipio(): ?int
    {
        return $this->municipio;
    }

    public function setMunicipio(?int $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getIdTipoVivienda(): ?TipoVivienda
    {
        return $this->idTipoVivienda;
    }

    public function setIdTipoVivienda(?TipoVivienda $idTipoVivienda): self
    {
        $this->idTipoVivienda = $idTipoVivienda;

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
