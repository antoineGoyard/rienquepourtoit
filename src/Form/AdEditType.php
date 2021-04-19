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
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AdEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', NumberType::class, [
                'label' => 'Prix'
                ])

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

            ->add('house_type',EntityType::class,[
                'class'=> HouseType::class,
                'choice_label' => 'name',
                'label' => 'Type de bien',
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
