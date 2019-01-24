<?php

namespace App\Form;

use App\Entity\RelacionPersonas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RelacionPersonasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idTipoRelacionPersonas')
            ->add('idPersona1')
            ->add('idPersona2')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RelacionPersonas::class,
        ]);
    }
}
