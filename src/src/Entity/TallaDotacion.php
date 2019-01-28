<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TallaDotacion
 *
 * @ORM\Table(name="talla_dotacion", indexes={@ORM\Index(name="IDX_2E0192CF8F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_2E0192CF41694E1F", columns={"id_elemento_dotacion"})})
 * @ORM\Entity
 */
class TallaDotacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria de  talla de vestimenta"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="talla_dotacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero", type="text", nullable=true, options={"comment"="Número de la talla de la talla que se esta midiendo. Ejemplo, 20, 20, XL, XXL, etc."})
     */
    private $numero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="unidades", type="text", nullable=true, options={"comment"="Unidades en qué se está midiendo la talla. Ejemplo cm, ml, pulgadas."})
     */
    private $unidades;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=true, options={"comment"="feha en la que se toma la medida de la talla"})
     */
    private $fechaRegistro;

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
     * @var \ElementoDotacion
     *
     * @ORM\ManyToOne(targetEntity="ElementoDotacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_elemento_dotacion", referencedColumnName="id")
     * })
     */
    private $idElementoDotacion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getUnidades(): ?string
    {
        return $this->unidades;
    }

    public function setUnidades(?string $unidades): self
    {
        $this->unidades = $unidades;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(?\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

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

    public function getIdElementoDotacion(): ?ElementoDotacion
    {
        return $this->idElementoDotacion;
    }

    public function setIdElementoDotacion(?ElementoDotacion $idElementoDotacion): self
    {
        $this->idElementoDotacion = $idElementoDotacion;

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
