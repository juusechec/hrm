<?php

namespace App\Form;

use App\Entity\Contrato;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idTipoContrato')
            ->add('objeto', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ] 
            ])
            ->add('obraOLabor', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ] 
            ])
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('ingreso', null, [
                'attr' => array('min' => 0)
            ])
            ->add('diasPeriodoPrueba', null, [
                'attr' => array('min' => 0)
            ])
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
