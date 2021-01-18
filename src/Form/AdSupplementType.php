<?php

namespace App\Form;

use App\Entity\AdSupplement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdSupplementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('garden')
            ->add('energy_class')
            ->add('bathroom')
            ->add('wc')
            ->add('garage')
            ->add('pool')
            ->add('long_content')
            ->add('rooms_number')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdSupplement::class,
        ]);
    }
}
