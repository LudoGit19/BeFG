<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Event;
use App\Form\TeamType;
use App\Entity\Location;
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
            ->add('teams', CollectionType::class, [
                'entry_type' => TeamType::class,
                'entry_options' => ['label' => true],
            ])

            ->add('dateCreated', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy-MM-dd',
            ])
            ->add('location', EntityType::class,[
                'class' => Location::class,
                'choice_label' => 'name'
            ] )
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
