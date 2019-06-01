<?php

namespace App\Form;

use App\Entity\Persona;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Tests\Fixtures\ChoiceSubType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $lugares = json_decode(file_get_contents(__DIR__.'/../../public/json/lugares.json'), true);

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
            ->add('lugarNacimiento', ChoiceType::class, [
                'choices' => $lugares,
                'attr' => [ 'data-live-search' => 'true' ],
                'required' => false
            ])
            ->add('tipoDocumento', ChoiceType::class,[
                'choices' => [
                    'CC'=>'CC',
                    'TI'=>'TI',
                    'CE'=>'CE',
                    'RC'=>'RC',
                    'Nit'=>'Nit',
                ],
                'required' => false
            ])
            ->add('numeroDocumento', NumberType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('fechaExpedicionDocumento', null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('lugarExpedicionDocumento', ChoiceType::class, [
                'choices' => $lugares,
                'attr' => [ 'data-live-search' => 'true' ]
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
                'required' => false
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
            ->add('idGenero')
            ->add('idEstadoCivil')
            ->add('idProcesoGestionIntegral')
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
