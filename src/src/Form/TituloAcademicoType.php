<?php

namespace App\Form;

use App\Entity\TituloAcademico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TituloAcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('codigoSnies')
            ->add('modalidadAcademica', ChoiceType::class, [
                'choices'  => [
                    'Tecnica' => 'Tecnica',
                    'Tecnologica' => 'Tecnologica',
                    'Tecnologica ESpecializada' => 'Tecnologica Especializada',
                    'Universitaria'=>'Universitaria',
                    'Especialización'=>'Especialización',
                    'Maestria/Magister'=>'Maestria/Magister',
                    'Doctorado '=>'Doctorado',
                    ]
            ])
            ->add('descripcion')
            
            ->add('abreviacion')
            ->add('orden')
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
