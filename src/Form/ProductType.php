<?php
namespace App\Form;
use App\Entity\Prroduct;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

Class ProductType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->add('Name', TextType::class, array (
            'label'         =>  'Nombre Producto',
            'attr'  =>  [
                'class' =>  'form-control form-control-lg',
                'placeholder'   =>  'No poner espacios, usar Guiones'
            ],
        ))
        ->add('submit', SubmitType::class, array (
            'label' => 'Guardar',
            'attr'      => [
                'class'     => 'btn btn-primary',
            ],
        ));
    }
}