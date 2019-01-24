<?php

namespace App\Form;

use App\Entity\RegistroVacuna;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistroVacunaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaDosis')
            ->add('fechaVencimientoDosis')
            ->add('observacion')
            ->add('idPersona')
            ->add('idTipoVacuna')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegistroVacuna::class,
        ]);
    }
}
