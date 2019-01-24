<?php

namespace App\Form;

use App\Entity\TallaDotacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TallaDotacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('unidades')
            ->add('fechaRegistro')
            ->add('idPersona')
            ->add('idElementoDotacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TallaDotacion::class,
        ]);
    }
}
