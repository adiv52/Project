<?php
namespace App\Form;

use App\Entity\CleaningInstructions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;


Class CleaningInstructionsType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('Text', TextType::class, array (
            'label' => 'Test',
            'attr'              =>  [
                'class'     => 'input'
            ]
        ))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CleaningInstructions::class,
        ]);
    }
}
