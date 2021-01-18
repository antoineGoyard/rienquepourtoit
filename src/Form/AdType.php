<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('zip_code')
            ->add('supplement')
            ->add('house_type')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
