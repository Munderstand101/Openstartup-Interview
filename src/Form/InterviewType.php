<?php

namespace App\Form;

use App\Entity\Entreprise;
use App\Entity\Groupes;
use App\Entity\Interview;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('interview')
//            ->add('entreprise')
//            ->add('groupe')
            ->add('entreprise', EntityType::class, [
                'class' => Entreprise::class,
                'attr' => [
                    'class' => 'selectpicker form-control',
                    'data-live-search' => 'true',
                ],
                'placeholder' => 'Choisir une entreprise',
                'choice_label' => 'nom'
            ])
            ->add('groupe', EntityType::class, [
                'class' => Groupes::class,
                'attr' => [
                    'class' => 'selectpicker form-control',
                    'data-live-search' => 'true',
                ],
                'placeholder' => 'Choisir un groupe',
                'choice_label' => 'nom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Interview::class,
        ]);
    }
}
