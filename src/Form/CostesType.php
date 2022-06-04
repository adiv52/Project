<?php
namespace App\Form;
use App\Entity\Costes;
use App\Entity\Proveedores;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

Class CostesType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
        ->add('PedidoProv', TextType::class, array (
            'label'     =>  'Pedido Proveedor',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('MTS', NumberType::class, array (
            'label' => 'Metros Totales Salida',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('MTE', NumberType::class, array (
            'label' => 'Metros Totales Entrada',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('CosteAlmProductBase', NumberType::class, array (
            'label' => 'Coste Almacen Producto Base',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('Transporte', NumberType::class, array (
            'label' => 'Coste Transporte',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('PrecioFactProv', NumberType::class, array (
            'label' => 'Precio Factura Proveedor',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('FactProv', TextType::class, array (
            'label' => 'Factura Proveedor',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('Extras', NumberType::class, array (
            'label' => 'Extras',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('Observaciones', TextType::class, array (
            'label' => 'Observaciones',
            'required'   =>  false,
            'attr'  =>  [
                'class' =>  'form-control form-control-lg'
            ],
        ))
        ->add('submit', SubmitType::class, array (
            'label' => 'Guardar',
            'attr'      => [
                'class'     => 'form-control form-control-lg',
            ],
        ));
    }
}