<?php

namespace App\Form;

use App\Entity\EducacionContinuada;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducacionContinuadaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaTerminacion',null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('fechaVencimiento',null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('idTituloEducacionContinuada')
            ->add('idPersona')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EducacionContinuada::class,
        ]);
    }
}
