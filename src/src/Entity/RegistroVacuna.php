<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegistroVacuna
 *
 * @ORM\Table(name="registro_vacuna", indexes={@ORM\Index(name="IDX_EE26879B8F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_EE26879BFF22CFDC", columns={"id_tipo_vacuna"})})
 * @ORM\Entity
 */
class RegistroVacuna
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria,  registro de la vacunación"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="registro_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_dosis", type="date", nullable=true, options={"comment"="fecha en la que se aplico la dosis"})
     */
    private $fechaDosis;

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
     * @var \TipoVacuna
     *
     * @ORM\ManyToOne(targetEntity="TipoVacuna")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_vacuna", referencedColumnName="id")
     * })
     */
    private $idTipoVacuna;


}
