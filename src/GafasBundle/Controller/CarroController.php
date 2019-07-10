<?php

namespace GafasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GafasBundle\Entity\Carro;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/carro")
 */
class CarroController extends Controller
{   
    /**
     * @Route("/{user}")
     */
    public function indexAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $carros = $em->getRepository('GafasBundle:Carro')
        ->findBy(array('user'=>$user));
        return $this->render('@Gafas/Carro/index.html.twig', array(
            'carros'=>$carros,
        ));
        
    }

    /**
     * @Route("/add/{id}/{user}")
     */
    public function addAction($id,$user)
    {
        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('GafasBundle:Carro')
        ->findOneBy(array('producto' => $id,'user'=>$user));

        if($carro){
            $carro->setCantidad($carro->getCantidad()+1);
        }
        else{
            $carro = new Carro();
            $carro->setProducto($id);
            $carro->setUser($user);
            $carro->setCantidad(1);
        }
        $em->persist($carro);
        $em->flush();
        
        return new Response("Ok");
    
    
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction()
    {
        return $this->render('GafasBundle:Carro:delete.html.twig', array(
            // ...
        ));
    }

}
