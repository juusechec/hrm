<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Task
{
    protected $description;

    protected $personas;

    protected $contrato;

    public function __construct()
    {
        $this->personas = new ArrayCollection();
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setContrato($contrato)
    {
        $this->contrato = $contrato;
    }

    public function getContrato()
    {
        return $this->contrato;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getPersonas()
    {
        return $this->personas;
    }

}