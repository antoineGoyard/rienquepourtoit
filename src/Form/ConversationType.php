<?php

namespace App\Form;

use App\Entity\Conversation;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConversationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('conversation')
            ->add('user',EntityType::class,[
                'class'=> User::class,
                'choice_label' => 'user1',
                'label' => 'User',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conversation::class,
        ]);
    }
}
