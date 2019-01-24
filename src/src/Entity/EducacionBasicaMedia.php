<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducacionBasicaMedia
 *
 * @ORM\Table(name="educacion_basica_media", uniqueConstraints={@ORM\UniqueConstraint(name="educacion_basica_media_uq", columns={"id_persona"})})
 * @ORM\Entity
 */
class EducacionBasicaMedia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="identificador primario tabla de educacion basica"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="educacion_basica_media_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ultimo_grado", type="integer", nullable=true, options={"comment"="ultimo grado aprobado, en caso de no haber finalizado indicar hasta que grado se alcanzo a llegar campo de texto"})
     */
    private $ultimoGrado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titulo_obtenido", type="text", nullable=true, options={"comment"="titulo obtenido al momento de culminar los estudios básicos"})
     */
    private $tituloObtenido;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_grado", type="date", nullable=true, options={"comment"="fecha en la que recibio el grado de la forma aaaa-mm-dd"})
     */
    private $fechaGrado;

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
