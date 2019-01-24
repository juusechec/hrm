<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EntregaElementoDotacion
 *
 * @ORM\Table(name="entrega_elemento_dotacion", indexes={@ORM\Index(name="IDX_4273978F41694E1F", columns={"id_elemento_dotacion"}), @ORM\Index(name="IDX_4273978F8F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class EntregaElementoDotacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="entrega_elemento_dotacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \ElementoDotacion
     *
     * @ORM\ManyToOne(targetEntity="ElementoDotacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_elemento_dotacion", referencedColumnName="id")
     * })
     */
    private $idElementoDotacion;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;


}
