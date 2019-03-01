<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            ->add('fechaNacimiento', BirthdayType::class)
            ->add('lugarNacimiento')
            ->add('tipoDocumento')
            ->add('numeroDocumento')
            ->add('fechaExpedicionDocumento', null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('lugarExpedicionDocumento')
            ->add('tipoSangre', ChoiceType::class, [
                'choices'  => [
                    'O+' => 'O+',
                    'O-' => 'O-',
                    'A+' => 'A+',
                ],
            ])
            ->add('telefonoFijo')
            ->add('telefonoMovil1')
            ->add('telefonoMovil2', null, [
                'label' => 'Segundo teléfono (no obligatorio)'
            ])
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
