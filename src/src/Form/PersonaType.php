<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primerNombre')
            ->add('otroNombre')
            ->add('primerApellido')
            ->add('segundoApellido')
            ->add('fechaNacimiento')
            ->add('tipoDocumento')
            ->add('numeroDocumento')
            ->add('fechaExpedicionDocumento')
            ->add('lugarExpedicionDocumento')
            ->add('tipoSangre')
            ->add('telefonoFijo')
            ->add('telefonoMovil1')
            ->add('telefonoMovil2')
            ->add('correoElectronico1')
            ->add('correoElectronico2')
            ->add('activo')
            ->add('idEstadoCivil')
            ->add('idProcesoGestionIntegral')
            ->add('idGenero')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persona::class,
        ]);
    }
}
