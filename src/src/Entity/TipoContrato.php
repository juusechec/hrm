<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoContrato
 *
 * @ORM\Table(name="tipo_contrato")
 * @ORM\Entity
 */
class TipoContrato
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primary key, tipo de contrato"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="enuncia el nombre de la modalidad de contrato"})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="Descripción de la tipología del contacto"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="Abreviatura de tres letras del tipo de contrato"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="Entero que se asigna para la visualización del tipo de contrato"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="Valor booleano, valida que el tipo de contrato este activo "})
     */
    private $activo;


}
