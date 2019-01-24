<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoCivil
 *
 * @ORM\Table(name="estado_civil")
 * @ORM\Entity
 */
class EstadoCivil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria del estado civil"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="estado_civil_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre breve del tipo de estado civil"})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="se enuncia cuál es la característica de éste estado, y como se soporta ante entidad competente"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="abreviatura de cada estado civil"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="orden en le que se va a mostrar los tipos de estado civil al usuario final"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="permite activar opciones en el caso que hay activas de los posibles estados civiles "})
     */
    private $activo;


}
