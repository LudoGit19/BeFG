<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Team;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', FileType::class, ['required'=>false])
            ->add('name')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name'
            ])
        ;

    //     ->add('category', ChoiceType::class, [
    //         'choices' =>[
    //             'u13' => 'u13',
    //             'u11' => 'u11',
    //             'u9' => 'u9',
    //             'u7' => 'u7'
    //         ],
    //         'empty_value' => "choisir une category"
    //     ])
    // ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
