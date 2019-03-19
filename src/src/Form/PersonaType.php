<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('primerNombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('otroNombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('primerApellido', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('segundoApellido', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('fechaNacimiento', BirthdayType::class)
            ->add('lugarNacimiento')
            ->add('tipoDocumento',ChoiceType::class,[
                    'choices'=>[
                        'CC'=>'CC',
                        'TI'=>'TI',
                        'CE'=>'CE',
                        'RC'=>'RC',
                        'Nit'=>'Nit',
                    ]
            ])
            ->add('numeroDocumento', NumberType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('fechaExpedicionDocumento', null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('lugarExpedicionDocumento')
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
            ])
            ->add('telefonoFijo', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('telefonoMovil1', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('telefonoMovil2', TextType::class, [
                'label' => 'Segundo teléfono (no obligatorio)'
            ])
            ->add('correoElectronico1', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('correoElectronico2', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ]
            ])
            ->add('idEstadoCivil')
            ->add('idProcesoGestionIntegral')
            ->add('idGenero')
            ->add('activo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Persona::class,
        ]);
    }
}
