<?php

namespace App\Form;

use App\Entity\Contrato;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objeto')
            ->add('obraOLabor')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('salarioBase', null, [
                'attr' => array('min' => 0)
            ])
            ->add('salarioAuxilio')
            ->add('diasPeriodoPrueba')
            ->add('idTipoContrato')
            ->add('idProrrogaContrato')
            ->add('idCargo')
            ->add('idPersona')
            ->add('idOtrosi')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contrato::class,
        ]);
    }
}
