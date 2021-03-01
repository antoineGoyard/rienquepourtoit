<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\HouseType;
use App\Entity\City;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', NumberType::class, [
                'label' => 'Prix'
                ])

            ->add('longitude')

            ->add('latitude')

            ->add('pieces_number', NumberType::class, [
                'label' => 'Nombre de Pièce'
                ])

            ->add('surface', NumberType::class, [
                'label' => 'Surface'
                ])

            ->add('ad_type', ChoiceType::class,[
                'label' => "Type d'annonce",
                'choices'  =>[
                    'vente' => "vente",
                     'location' => "location",
                    ],
            ])
            ->add('short_content',TextareaType::class,[
                'label' => 'Description courte'
                ])

            ->add('city', ChoiceType::class, [
                'choice_label' => 'name',
                'attr'=>['class'=>'selectpicker','data-live-search' => true],
                'label' => "Ville de l'annonce : ",
                'placeholder' => 'placeholder',
                'mapped' => false,
            ])

            ->add('address')

            ->add('house_type',EntityType::class,[
                'class'=> HouseType::class,
                'choice_label' => 'name',
                'label' => 'Type de bien',
            ])
        ;
        $builder->get('city')->resetViewTransformers();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
