<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType as SymfonyTextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Users;
use AppBundle\Entity\Tache;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ProductionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('users', EntityType::class, [
            // looks for choices from this entity
            'class' => 'AppBundle:Users',
        
            // uses the User.username property as the visible option string
            'choice_label'  => function (Users $users) {
                return $users->getNom() . ' ' . $users->getPrenom();}

        ])
        ->add('dateTache',  DateTimeType::class, [
            'widget' => 'single_text' // this is actually the default format for single_text
            
        ])
        ->add('tache', EntityType::class, [
            // looks for choices from this entity
            'class' => 'AppBundle:Tache',
            'choice_label'  => function (Tache $tache) {
                return $tache->getNom();
            }
 
        ]) ->add('Clients', EntityType::class, [
            // looks for choices from this entity
            'class' => 'AppBundle:Clients',
            'choice_label'  => 'nomc'
 
        ])->add('commande') 
        
        ->add('superviseur', EntityType::class, [
            // looks for choices from this entity
            'class' => 'AppBundle:Users',
            'choice_label'  => function (Users $users) {
                if ($users->getPoste() === 'SUPERVISEUR') {
                return $users->getNom() . ' ' . $users->getPrenom();
              }  
              else {
                  
                return '* * * * * * * * *';
            }
        }

        ])->add('detail')->add('estime',NumberType::class,[ 'attr' => array('step' => '0.01','min'=>'0')])->add('note', SymfonyTextType::class,['label' => 'Remarques','required'   => false]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Production'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_production';
    }


}
