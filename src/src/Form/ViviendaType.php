<?php

namespace App\Form;

use App\Entity\Vivienda;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ViviendaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('direccion')
            ->add('barrio')
            ->add('estrato', null, [
                'attr' => array('min' => 0)
            ])
            ->add('pais')
            ->add('departamento')
            ->add('municipio')
            ->add('idTipoVivienda')
            ->add('idPersona')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vivienda::class,
        ]);
    }
}
