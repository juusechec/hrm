<?php

namespace App\Form;

use App\Entity\ElementoDotacion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElementoDotacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('descripcion', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('abreviacion', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('orden', null, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('activo')
            ->add('idTipoElementoDotacion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ElementoDotacion::class,
        ]);
    }
}
