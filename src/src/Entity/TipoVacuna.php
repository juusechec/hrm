<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoVacuna
 *
 * @ORM\Table(name="tipo_vacuna")
 * @ORM\Entity
 */
class TipoVacuna
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria, catálogo de vacunas"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tipo_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre de la vacuna"})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="Descripción de que compone la vacua,  dosificación "})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patologia", type="text", nullable=true, options={"comment"="patología y enfermedades para la cual sirve la vacuna"})
     */
    private $patologia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="abreviación de la vacuna máximo tres caracteres"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="valor entero en cual se asigna en que orden en que se visualizara"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="valor booleano que nos indica si la vacuna se encuentra activa o inactiva"})
     */
    private $activo;


}
