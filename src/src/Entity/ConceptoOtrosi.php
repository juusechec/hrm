<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConceptoOtrosi
 *
 * @ORM\Table(name="concepto_otrosi")
 * @ORM\Entity
 */
class ConceptoOtrosi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"comment"="primary key, conceptos otro si"})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="concepto_otrosi_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="text", nullable=true, options={"comment"="nombre del concepto de otro si"})
     */
    private $nombre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true, options={"comment"="describe el concepto de otro si en el contrato"})
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abreviacion", type="text", nullable=true, options={"comment"="Abreviación de tres letras, del concepto de otro si"})
     */
    private $abreviacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="orden", type="integer", nullable=true, options={"comment"="nùmero entero, que muestra el orden en que se visualiza los conceptos de otro si al momento de visualizarlos"})
     */
    private $orden;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true, options={"comment"="valor booleano, indica si el concepto esta activo en los conceptos de otros si en la organización para aplicarlo  en el contrato"})
     */
    private $activo;


}
