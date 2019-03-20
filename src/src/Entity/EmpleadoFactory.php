<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

// https://symfony.com/doc/current/form/form_collections.html
class EmpleadoFactory
{
    protected $persona;

    protected $familiares;

    protected $contrato;

    public function __construct()
    {
        $this->familiares = new ArrayCollection();
        $this->persona = new Persona();
    }

    public function getPersona()
    {
        return $this->persona;
    }

    public function setPersona($persona)
    {
        $this->persona = $persona;
    }

    public function getContrato()
    {
        return $this->contrato;
    }

    public function setContrato($contrato)
    {
        $this->contrato = $contrato;
    }

    public function getFamiliares()
    {
        return $this->familiares;
    }

}