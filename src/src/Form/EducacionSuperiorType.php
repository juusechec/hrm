<?php

namespace App\Form;

use App\Entity\EducacionSuperior;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('fechaExpedicionTarjetaProfesional', null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('fechaVencimientoTarjetaProfesional', null, [
                'years' => range(date('Y'), date('Y')+100)
            ])
            ->add('numeroTarjetaProfesional', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
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
