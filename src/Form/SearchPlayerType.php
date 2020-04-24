<?php

namespace App\Form;

use App\Entity\SearchPlayer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchPlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
     

        $builder
            ->add('minYearOfBirth', IntegerType::class, [
                "required" => false,
                'attr' => [
                    'placeholder' => 'de...'
                ],
                
            ])
            ->add('maxYearOfBirth', IntegerType::class, [
                "required" => false,
                'attr' => [
                    'placeholder' => 'de...'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchPlayer::class,
        ]);
    }
}
