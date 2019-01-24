<?php

namespace App\Form;

use App\Entity\EducacionSuperior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducacionSuperiorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroSemestreAprobados')
            ->add('graduado')
            ->add('fechaGrado')
            ->add('fechaExpedicionTarjetaProfesional')
            ->add('fechaVencimientoTarjetaProfesional')
            ->add('numeroTarjetaProfesional')
            ->add('idTituloAcademico')
            ->add('idPersona')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EducacionSuperior::class,
        ]);
    }
}
