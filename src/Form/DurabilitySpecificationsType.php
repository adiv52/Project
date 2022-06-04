<?php
namespace App\Form;

use App\Entity\DurabilitySpecifications;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


Class DurabilitySpecificationsType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('TestName', TextType::class, array (
            'label' => 'Test',
            'attr'              =>  [
                'class'     => 'input'
            ]
        ))
        ->add('TestSpecification', TextType::class, array (
            'label' => 'Test Specification',
            'attr'              =>  [
                'class'     => 'input'
            ]
        ))
        ->add('Unit', TextType::class, array (
            'label' => 'Unit',
            'attr'              =>  [
                'class'     => 'input'
            ]
        ))
        ->add('TestResult', TextType::class, array (
            'label' => 'Test Result',
            'attr'              =>  [
                'class'     => 'input'
            ]
        ))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DurabilitySpecifications::class,
        ]);
    }
}
