<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCuentaBancaria
 *
 * @ORM\Table(name="tipo_cuenta_bancaria")
 * @ORM\Entity
 */
class TipoCuentaBancaria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_cuenta_bancaria_id_seq", allocationSize=1, initialValue=1)
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


}
