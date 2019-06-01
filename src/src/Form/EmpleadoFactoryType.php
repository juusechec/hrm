<?php
namespace App\Form;

use App\Entity\EmpleadoFactory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

// https://symfony.com/doc/current/form/form_collections.html
// https://symfony.com/doc/current/reference/forms/types/form.html
// https://symfony.com/doc/current/reference/forms/types.html
class EmpleadoFactoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('persona', PersonaType::class);

        $builder->add('familiares', CollectionType::class, [
            'entry_type' => PersonaType::class,
            'entry_options' => ['label' => false],
        ]);

        $builder->add('relacionFamiliares', CollectionType::class, [
            'entry_type' => RelacionPersonasType::class,
            'entry_options' => ['label' => false],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmpleadoFactory::class,
        ]);
    }
}