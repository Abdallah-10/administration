<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateType as SymfonyDateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')->add('prenom')->add('telephone')->add('passWord')->add('email')->add('avatar')->add('poste',ChoiceType::class, [
            'choices'  => [
                'B2B SCÈNE'   => 'B2B SCÈNE',
                'B2B CANAPE' => 'B2B CANAPE',
                'DEV'   => 'DEV',
                'ADMIN'   => 'ADMIN',
                'TFR'   => 'TFR',
                'COMMERCIAL'   => 'COMMERCIAL',
                'DA'   => 'DA',
            ],
        ])
            ->add('fonction',ChoiceType::class, [
                'choices'  => [
                    'graphiste'   => 'graphiste',
                    'manager' => 'manager',
                    'DEV'   => 'DEV',
                    'account manager'   => 'account manager',
                    'technicien'   => 'technicien',      
                ],
            ])->add('niveau',ChoiceType::class, [
                'choices'  => [
                    'junior'   => 'junior',
                    'medium' => 'medium',
                    'senior'   => 'senior',         
                ],
            ])->add('site',ChoiceType::class, [
                'choices'  => [
                    'Tunis'   => 'Tunis',
                    'Paris' => 'Paris',
                    'Tourcoing'   => 'Tourcoing',           
                ],
            ])->add('type_contrat',ChoiceType::class, [
                'choices'  => [
                    'CDI'   => 'CDI',
                    'CDI EXO2' => 'CDI EXO2',
                    'CDI EXO5'   => 'CDI EXO5',  
                    'CDD'   => 'CDD',  
                    'CDD EXO2'   => 'CDD EXO2',  
                    'CDD EXO5'   => 'CDD EXO5',  
                    'SIVP 1'   => 'SIVP 1',  
                    'SIVP 2'   => 'SIVP 2',  
                    'CAIP'   => 'CAIP',  
                    'SIDES'   => 'SIDES',          
                ],
            ])
        ->add('date',BirthdayType::class)->add('birthday',BirthdayType::class)->add('conge')->add('taux');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Users'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_users';
    }


}
