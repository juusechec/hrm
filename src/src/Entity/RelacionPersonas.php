<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelacionPersonas
 *
 * @ORM\Table(name="relacion_personas", indexes={@ORM\Index(name="IDX_92EDFA4B18FC58DF", columns={"id_tipo_relacion_personas"}), @ORM\Index(name="IDX_92EDFA4BB48BAC58", columns={"id_persona1"}), @ORM\Index(name="IDX_92EDFA4B2D82FDE2", columns={"id_persona2"})})
 * @ORM\Entity
 */
class RelacionPersonas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria de la tabla relación personas"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="relacion_personas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \TipoRelacionPersonas
     *
     * @ORM\ManyToOne(targetEntity="TipoRelacionPersonas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_relacion_personas", referencedColumnName="id")
     * })
     */
    private $idTipoRelacionPersonas;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona1", referencedColumnName="id")
     * })
     */
    private $idPersona1;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona2", referencedColumnName="id")
     * })
     */
    private $idPersona2;


}
