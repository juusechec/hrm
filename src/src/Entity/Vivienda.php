<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vivienda
 *
 * @ORM\Table(name="vivienda", indexes={@ORM\Index(name="IDX_2DFFABDE45122072", columns={"id_tipo_vivienda"})})
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
     * @var int|null
     *
     * @ORM\Column(name="estrato", type="integer", nullable=true)
     */
    private $estrato;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Persona", mappedBy="idVivienda")
     */
    private $idPersona;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idPersona = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
