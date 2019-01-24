<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profesion
 *
 * @ORM\Table(name="profesion")
 * @ORM\Entity
 */
class Profesion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria de las profesiones"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="profesion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre de la profesión"})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="descripción, y área de aplicación de la carrera"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="abreviatura para la profesión tamaño del campo de tres caracteres"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="campo tipo entero donde se organiza el orden de visualización "})
     */
    private $orden;

    /**
     * @var int|null
     *
     * @ORM\Column(name="codigo_snies", type="smallint", nullable=true, options={"comment"="Código de la profesión según el ministerio de educación nacional"})
     */
    private $codigoSnies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modalidad_academica", type="text", nullable=true)
     */
    private $modalidadAcademica;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    private $activo;


}
