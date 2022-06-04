<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Entity\Costes;
use App\Form\CostesType;
use App\Form\ProductType;

class CostesController extends AbstractController
{
    /**
     * @Route("/CostesProducto/Inicio", name="CostesProductoInicio")
     */
    public function CostesProductoInicio(Request $request){
        $rep = $this -> getDoctrine() -> getRepository(Product::class);
        $Productos = $rep->findAll();
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            
            $em->persist($product);
            $flush = $em->flush();
            
            if ($flush == null){
                $status = "Producto creado correctamente";
                return $this->redirect("Inicio");
            }else{
                $status = "Producto no creado";
            }
        }
        return $this->render('Costes/InicioCostes.html.twig', [
            'form' => $form->createView(),
            "product" => $Productos
        ]);
    }

    /**
     * @Route("/CostesProducto/producto/{id}", name="ViewAddCoste", requirements={"id":"\d+"})
     */
    public function ViewAddCoste(Request $request, Product $product){
        $costes = new Costes();
        $form = $this->createForm(CostesType::class, $costes);

        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $costes->setProduct($product);
            $em->persist($costes);
            $flush = $em->flush();
            
            if ($flush == null){
                $status = "Producto creado correctamente";
            }else{
                $status = "Producto no creado";
            }
        }
        return $this->render('Costes/Producto/ViewAddCosteProduct.html.twig', [
            'form' => $form->createView(),
            'product'   => $product,   
        ]);
    }

    /**
     * @Route("CostesProducto/producto/costeView/{id}", name="costeView", requirements={"id":"\d+"})
     */
    public function costeView( Request $request, EntityManagerInterface $em,Costes $coste ){
        $costes = $coste;
        $form = $this->createForm(CostesType::class, $costes);
        $form->handleRequest($request); 
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($costes);
            $flush = $em->flush();

            if ($flush == null){
                $status = "Has actualizado los datos correctamente";
            }else{
                $status = "No has actualizado los datos correctamente";
            }
        }
        return $this->render('Costes/Producto/ViewCoste.html.twig',[
            'form' => $form->createView(),
            'coste'  => $costes,
        ]);
    }
    
}
?> 