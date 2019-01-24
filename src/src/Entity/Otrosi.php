<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Otrosi
 *
 * @ORM\Table(name="otrosi", indexes={@ORM\Index(name="IDX_F6F34DE0FDBC560D", columns={"id_concepto_otrosi"})})
 * @ORM\Entity
 */
class Otrosi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primary key, tabla otro_si"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="otrosi_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=true, options={"comment"="fecha en la que entra en vigencia  el otro si al contrato"})
     */
    private $fechaInicio;

    /**
     * @var \ConceptoOtrosi
     *
     * @ORM\ManyToOne(targetEntity="ConceptoOtrosi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_concepto_otrosi", referencedColumnName="id")
     * })
     */
    private $idConceptoOtrosi;


}
