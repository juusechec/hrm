<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrato
 *
 * @ORM\Table(name="contrato", indexes={@ORM\Index(name="IDX_66696523E84EE8F", columns={"id_tipo_contrato"}), @ORM\Index(name="IDX_666965237019D29B", columns={"id_prorroga_contrato"}), @ORM\Index(name="IDX_66696523D56B1641", columns={"id_cargo"}), @ORM\Index(name="IDX_666965238F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_66696523D0C4F80D", columns={"id_otrosi"})})
 * @ORM\Entity
 */
class Contrato
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primry key, tabla de contratos"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contrato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="objeto", type="text", nullable=true, options={"comment"="texto donde se especifíca el objeto del contrato a celebrar"})
     */
    private $objeto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="obra_o_labor", type="text", nullable=true, options={"comment"="texto que se describe obra a labor en la firma del contrato"})
     */
    private $obraOLabor;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=true, options={"comment"="fecha en la que se inicia el contrato"})
     */
    private $fechaInicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true, options={"comment"="fecha en la que finaliza el contrato"})
     */
    private $fechaFin;

    /**
     * @var int|null
     *
     * @ORM\Column(name="salario_base", type="bigint", nullable=true, options={"comment"="salario base a devengar el contratante"})
     */
    private $salarioBase;

    /**
     * @var int|null
     *
     * @ORM\Column(name="salario_auxilio", type="bigint", nullable=true, options={"comment"="salario que se asigna "})
     */
    private $salarioAuxilio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dias_periodo_prueba", type="integer", nullable=true, options={"comment"="valor entero de los días que se da un periodo de prueba al contratante"})
     */
    private $diasPeriodoPrueba;

    /**
     * @var \TipoContrato
     *
     * @ORM\ManyToOne(targetEntity="TipoContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_contrato", referencedColumnName="id")
     * })
     */
    private $idTipoContrato;

    /**
     * @var \ProrrogaContrato
     *
     * @ORM\ManyToOne(targetEntity="ProrrogaContrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prorroga_contrato", referencedColumnName="id")
     * })
     */
    private $idProrrogaContrato;

    /**
     * @var \Cargo
     *
     * @ORM\ManyToOne(targetEntity="Cargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cargo", referencedColumnName="id")
     * })
     */
    private $idCargo;

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
     * @var \Otrosi
     *
     * @ORM\ManyToOne(targetEntity="Otrosi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_otrosi", referencedColumnName="id")
     * })
     */
    private $idOtrosi;


}
