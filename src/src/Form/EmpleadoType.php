<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primerNombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('otroNombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('primerApellido', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('segundoApellido', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('fechaNacimiento', BirthdayType::class)
            ->add('lugarNacimiento', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('tipoDocumento', ChoiceType::class, [
                'choices' => [
                    'CC' => 'CC',
                    'TI' => 'TI',
                    'CE' => 'CE',
                    'RC' => 'RC',
                    'Nit' => 'Nit',
                ]
            ])
            ->add('numeroDocumento', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('fechaExpedicionDocumento', null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('lugarExpedicionDocumento', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('tipoSangre', ChoiceType::class, [
                'choices'  => [
                    'O+' => 'O+',
                    'O-' => 'O-',
                    'A+' => 'A+',
                    'A-'=>'A-',
                    'B+'=>'B+',
                    'B-'=>'B-',
                    'AB+'=>'AB+',
                    'AB-'=>'AB-'
                ],
                'attr' => [ 'data-live-search' => 'true' ]
            ])
            ->add('telefonoFijo', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('telefonoMovil1', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('telefonoMovil2', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'label' => 'Segundo teléfono (no obligatorio)',
                'required' => false
            ])
            ->add('correoElectronico1', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('correoElectronico2', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false 
            ])
            ->add('idEstadoCivil')
            ->add('idProcesoGestionIntegral')
            ->add('idGenero')
            ->add('activo', null, [
                'attr' => [ 'class' => 'filled-in' ],
                'required' => false 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
        //     'data_class' => Persona::class,
        // ]);
    }
}
