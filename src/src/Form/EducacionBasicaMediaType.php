<?php

namespace App\Form;

use App\Entity\EducacionBasicaMedia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EducacionBasicaMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ultimoGradoAprobado')
            ->add('tituloObtenido', TextType::class, [
                'attr' => [ 'class' => 'form-control' ],
                'label_attr' => [ 'class' => 'form-label' ],
                'required' => false
            ])
            ->add('fechaGrado',null, [
                'years' => range(date('Y'), date('Y')-100)
            ])
            ->add('idPersona')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EducacionBasicaMedia::class,
        ]);
    }
}
