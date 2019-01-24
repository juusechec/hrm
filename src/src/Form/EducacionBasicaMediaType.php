<?php

namespace App\Form;

use App\Entity\EducacionBasicaMedia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducacionBasicaMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ultimoGradoAprobado')
            ->add('tituloObtenido')
            ->add('fechaGrado')
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
