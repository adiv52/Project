<?php

namespace App\Controller;

use App\Entity\Coleccion;
use App\Entity\Embarque;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Snappy\Pdf;

class ColeccionesController extends AbstractController
{

    /**
     * @Route("Colecciones", name="Colecciones")
     */
    public function Colecciones(){
        $rep = $this -> getDoctrine() -> getRepository(Coleccion::class);
        $colection = $rep->findAll();
        return $this->render('Colecciones.html.twig',array(
            "Colecciones" => $colection
        ));
    }

    /**
     * @Route("Embarque/view/{id}", name="EmbView", requirements={"id":"\d+"})
     */
    public function EmbView(Embarque $embarque){
        return $this->render('EmbView.html.twig',[
            'embarque'  => $embarque,
        ]);
    }

    /**
     * @Route("ColectionPdf/{id}", name="ColectionPdf", requirements={"id":"\d+"})
     */
    public function ColectionPdf(Coleccion $colection, Pdf $snappy){
        $html = $this->renderView("FichaTecnica.html.twig", array(
            "title" => "Ficha técnica",
            "colection" => $colection
        ));
        
        $filename = "Ficha_tecnica_".$colection->getNombre()."_SK";
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'              =>  'aplication/pdf',
                'Content-Disposition'       =>  'inline; filename="'.$filename.'".pdf',
                'binary'                    =>  '--viewport-size 1024x768'
            )
        );
        
    }
}
