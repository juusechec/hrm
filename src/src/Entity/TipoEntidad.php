<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoEntidad
 *
 * @ORM\Table(name="tipo_entidad")
 * @ORM\Entity
 */
class TipoEntidad
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primary key del tipo de entidad"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_entidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre del tipo de la entidad"})
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
     * @var string|null
     *
     * @ORM\Column(name="orden", type="string", nullable=true)
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;


}
