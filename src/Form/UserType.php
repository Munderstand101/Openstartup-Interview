<?php

namespace App\Form;

use App\Entity\Groupes;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
//            ->add('roles')
            ->add('roles', ChoiceType::class, array(
//                    'attr'  =>  array('class' => 'form-control',
//                        'style' => 'margin:5px 0;'),
                    'attr' => [
                        'class' => 'selectpicker form-control',
                        'data-live-search' => 'true',
                    ],
                    'choices' =>
                        array
                        (
                            'ROLE_ADMIN' => array
                            (
                                'Yes' => 'ROLE_ADMIN',
                            ),
                            'ROLE_USER' => array
                            (
                                'Yes' => 'ROLE_USER'
                            ),
//                            'ROLE_STUDENT' => array
//                            (
//                                'Yes' => 'ROLE_STUDENT'
//                            ),
//                            'ROLE_PARENT' => array
//                            (
//                                'Yes' => 'ROLE_PARENT'
//                            ),
                        )
                ,
                    'multiple' => true,
                    'required' => true,
                )
            )
          /*  ->add('roles', EntityType::class, array(
                'class'=> 'PaginasUsuariosBundle:Roles',
                'multiple' => true, // Allow multiple selection
                'choice_label'=>'nombre',))*/

            /*->add('roles', CheckboxType::class,[
                'data' => in_array("ROLE_ADMIN",),
                'label' => false,
                'mapped' => false,
                'required' => false,
            ])*/

            ->add('password')
//            ->add('groupes')
            /*->add('groupes', EntityType::class,[
                'class' => Groupes::class,
                'label' => false,
                'placeholder' => 'Choisir un groupe',
                'choice_label' => 'nom',
                'required' => false,
            ])*/
            ->add('groupes', EntityType::class, [
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
            'data_class' => User::class,
        ]);
    }
}
