<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AgreeableElephant
 *
 * @ORM\Table(name="agreeable_elephant")
 * @ORM\Entity
 */
class AgreeableElephant
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="agreeable_elephant_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hola", type="string", length=255, nullable=false)
     */
    private $hola;


}
