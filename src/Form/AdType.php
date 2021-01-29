<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use App\Form\AdSupplementType;
use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
use App\Entity\AdSupplement;
use App\Entity\HouseType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', NumberType::class)
            ->add('longitude')
            ->add('latitude')
            ->add('pieces_number', NumberType::class)
            ->add('surface', NumberType::class)
            ->add('ad_type')
            ->add('short_content',TextareaType::class, ['label' => 'Nom'])
            ->add('city', ChoiceType::class,[
                'attr' => ['class' => 'chosen-select '],
                'choices'  => [
                    'option1' => "option1",
                ],])
            ->add('address')
            ->add('house_type',EntityType::class,[
                'class'=> HouseType::class,
                'choice_label' => 'name',
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
