<?php

namespace App\Form;

use App\Entity\ExamenMedico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamenMedicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('recomendaciones')
            ->add('idTipoExamenMedico')
            ->add('idTipoProgramaExamenMedico')
            ->add('idConceptoExamenMedico')
            ->add('idPersona')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExamenMedico::class,
        ]);
    }
}
