<?php

namespace App\Form;

use App\Entity\AuxilioContrato;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuxilioContratoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // https://stackoverflow.com/questions/13879604/symfony2-date-choice-input-renders-timestamp-instead-of-month-name
        // http://userguide.icu-project.org/formatparse/datetime#TOC-Date-Time-Format-Syntax
        // Addsupport in centos:
        // https://serverfault.com/questions/616790/how-to-add-language-support-on-centos-7-on-docker
        // https://www.rosehosting.com/blog/how-to-set-up-system-locale-on-centos-7/
        $builder
            ->add('fecha', null, [
                'placeholder' => 'Seleccione una opción',
                'input' => 'datetime',
                'widget' => 'choice',
                'format' => 'yMMMMd',
            ])
            ->add('idTipoAuxilioContrato', null, [
                'placeholder' => 'Seleccione una opción'
            ])
            ->add('idContrato', null, [
                'placeholder' => 'Seleccione una opción'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AuxilioContrato::class,
        ]);
    }
}
