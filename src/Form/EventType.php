<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Event;
use App\Form\TeamType;
use App\Entity\Location;
use App\Form\LocationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('teams', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'name', // equals $costTypeConnections->getDepartmentConnexion()->getType();
                'expanded' => true, // will output a set of inputs instead of a select tag
                'multiple' => true, // will output checkboxes instead of radio buttons
                'required' => true, // unused as multiple is true
            ])
            ->add('dateCreated', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ])
            ->add('duration', DateType::class)
            ->add('status')
            ->add('location', LocationType::class)
            // ->add('status')
        ;
        // dd($builder);
    }
    

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
