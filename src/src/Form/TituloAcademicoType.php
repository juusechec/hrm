<?php

namespace App\Form;

use App\Entity\TituloAcademico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TituloAcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('codigoSnies', null, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('modalidadAcademica', ChoiceType::class, [
                'choices'  => [
                    'Técnica' => 'Técnica',
                    'Tecnológica' => 'Tecnológica',
                    'Tecnológica Especializada' => 'Tecnológica Especializada',
                    'Pregado' => 'Pregado',
                    'Especialización' => 'Especialización',
                    'Maestría' => 'Maestría',
                    'Doctorado' => 'Doctorado',
                ]
            ])
            ->add('descripcion', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('abreviacion', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('orden', null, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('activo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TituloAcademico::class,
        ]);
    }
}
