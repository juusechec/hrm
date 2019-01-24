<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CuentaBancaria
 *
 * @ORM\Table(name="cuenta_bancaria", indexes={@ORM\Index(name="IDX_ECD0C9CE8F781FEB", columns={"id_persona"}), @ORM\Index(name="IDX_ECD0C9CE367A484D", columns={"id_tipo_cuenta_bancaria"}), @ORM\Index(name="IDX_ECD0C9CE6BAF85FC", columns={"id_entidad_financiera"})})
 * @ORM\Entity
 */
class CuentaBancaria
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cuenta_bancaria_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="numero", type="text", nullable=true)
     */
    private $numero;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="principal", type="boolean", nullable=true)
     */
    private $principal;

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
     * @var \TipoCuentaBancaria
     *
     * @ORM\ManyToOne(targetEntity="TipoCuentaBancaria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_cuenta_bancaria", referencedColumnName="id")
     * })
     */
    private $idTipoCuentaBancaria;

    /**
     * @var \EntidadFinanciera
     *
     * @ORM\ManyToOne(targetEntity="EntidadFinanciera")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_entidad_financiera", referencedColumnName="id")
     * })
     */
    private $idEntidadFinanciera;


}
