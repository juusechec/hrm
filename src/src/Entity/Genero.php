<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genero
 *
 * @ORM\Table(name="genero")
 * @ORM\Entity
 */
class Genero
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primary key, listado de genero"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="genero_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre del genero "})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="breve característica del genero, y posible características  del mismo, y como sustentar médicamente esta condición"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="abreviatura de tres letras para el genero"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="número de orden en las que se visualizaran al momento de desplegarlas"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="valor booleano que indica si esta en vigencia o no la base de datos"})
     */
    private $activo;


}
