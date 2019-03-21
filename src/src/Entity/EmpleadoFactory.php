<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

// https://symfony.com/doc/current/form/form_collections.html
class EmpleadoFactory
{
    protected $persona;

    protected $familiares;

    protected $relacionFamiliares;

    public function __construct()
    {
        $this->persona = new Persona();
        $this->familiares = new ArrayCollection();
        $this->relacionFamiliares = new ArrayCollection();
    }

    public function getPersona()
    {
        return $this->persona;
    }

    public function setPersona($persona)
    {
        $this->persona = $persona;
    }

    public function getFamiliares()
    {
        return $this->familiares;
    }

    public function getRelacionFamiliares()
    {
        return $this->relacionFamiliares;
    }

}