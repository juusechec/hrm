<?php

namespace App\Form;

use App\Entity\TituloEducacionContinuada;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TituloEducacionContinuadaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('horas', null, [
                'attr' => array('min' => 0)
            ])
            ->add('abreviacion')
            ->add('orden')
            ->add('activo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TituloEducacionContinuada::class,
        ]);
    }
}
