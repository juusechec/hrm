<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TallaVestimenta
 *
 * @ORM\Table(name="talla_vestimenta", indexes={@ORM\Index(name="IDX_D0ACECD28F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_D0ACECD23D071BE0", columns={"id_tipo_vestimenta"})})
 * @ORM\Entity
 */
class TallaVestimenta
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria de  talla de vestimenta"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="talla_vestimenta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="talla", type="text", nullable=true, options={"comment"="unidad de medida de la talla que se esta midiendo"})
     */
    private $talla;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_creacion", type="date", nullable=true, options={"comment"="feha en la que se toma la medida de la talla"})
     */
    private $fechaCreacion;

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
     * @var \TipoVestimenta
     *
     * @ORM\ManyToOne(targetEntity="TipoVestimenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_vestimenta", referencedColumnName="id")
     * })
     */
    private $idTipoVestimenta;


}
