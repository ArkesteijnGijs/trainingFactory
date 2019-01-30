<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/16/2019
 * Time: 8:56 AM
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstructorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loginname')
            ->add('password', PasswordType::class)
            ->add('firstname')
            ->add('preprovision')
            ->add('lastname')
            ->add('birthdate')
            ->add('hiringDate')
            ->add('salary')
            ->add('social_sec_number')
            ->add('opslaan',SubmitType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>'AppBundle\Entity\Instructor'
        ]);
    }
}