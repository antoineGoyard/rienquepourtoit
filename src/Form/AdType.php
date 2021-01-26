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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price')
            ->add('longitude')
            ->add('latitude')
            ->add('pieces_number')
            ->add('surface')
            ->add('ad_type')
            ->add('short_content')
            ->add('created_at')
            ->add('city')
            ->add('address')
            ->add('house_type',EntityType::class,[
                'class'=> HouseType::class,
                'choice_label' => 'name',
            ])
            ->add('user',EntityType::class,[
                'class'=> User::class,
                'choice_label' => 'pseudo',
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
