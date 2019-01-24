<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EducacionSuperior
 *
 * @ORM\Table(name="educacion_superior", indexes={@ORM\Index(name="IDX_386362A1FC88112D", columns={"id_profesion"}), @ORM\Index(name="IDX_386362A18F781FEB", columns={"id_persona"})})
 * @ORM\Entity
 */
class EducacionSuperior
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="llave primaria para tabla que relaciona usuario con listado profesiones"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="educacion_superior_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_semestre_aprobados", type="integer", nullable=true, options={"comment"="En caso de haber finalizado sus estudios superiores, indica la cantidad de semestres cursados, campo de tipo numérico"})
     */
    private $numeroSemestreAprobados;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="graduado", type="boolean", nullable=true, options={"comment"="variable booleana que indica si logro o no el grado en dicha profesión"})
     */
    private $graduado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_terminacion", type="date", nullable=true, options={"comment"="fecha en a que recibió el grado del tipo aaaa-mm-dd"})
     */
    private $fechaTerminacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero_tarjeta_profesional", type="text", nullable=true, options={"comment"="número de la tarjeta profesional otorgado por la entidad reguladora"})
     */
    private $numeroTarjetaProfesional;

    /**
     * @var \Profesion
     *
     * @ORM\ManyToOne(targetEntity="Profesion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_profesion", referencedColumnName="id")
     * })
     */
    private $idProfesion;

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
