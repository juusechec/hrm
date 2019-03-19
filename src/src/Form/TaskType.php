<?php
namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

// https://symfony.com/doc/current/form/form_collections.html
// https://symfony.com/doc/current/reference/forms/types/form.html
// https://symfony.com/doc/current/reference/forms/types.html
class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');

        $builder->add('personas', CollectionType::class, [
            'entry_type' => PersonaType::class,
            'entry_options' => ['label' => false],
        ]);

        $builder->add('contrato', ContratoType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}