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
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_entrega_dotacion", type="date", nullable=true)
     */
    private $fechaEntregaDotacion;

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


}
