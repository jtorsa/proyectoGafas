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
     * @Route("/{user}", name="hoal")
     */
    public function indexAction($user)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT c.id, g.model as producto, c.producto as idp,
         g.price as price, c.cantidad as cantidad, c.user as user, g.image as imagen
        FROM GafasBundle:Carro as  c, GafasBundle:Gafas g
        where c.producto = g.id
        and c.user = :user')->setParameter('user', $user);
        $carros= $query->getResult();

        $query2 = $em->createQuery('SELECT  g
        FROM GafasBundle:Gafas g
        where g.id NOT IN (
        Select  c.producto
        from GafasBundle:Carro as  c
        where c.user= :user)')->setParameter('user', $user);
        $query2->setMaxResults(3);
        $productos = $query2->getResult();
        $long= count($carros);
        
        return $this->render('@Gafas/Carro/index.html.twig', array(
            'carros'=>$carros, 'total'=>0,'counter'=>$long,'productos'=>$productos
        ));
        
    }

    /**
     * @Route("/add/{id}/{user}" , name="añadir")
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
        
        return $this->indexAction($user);
     
    
    }

    /**
     * @Route("/less/{id}/{user}")
     */
    public function lessAction($id,$user)
    {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('GafasBundle:Carro')
        ->findOneBy(array('producto' => $id,'user'=>$user));

        if($carro->getCantidad()>1){
            $carro->setCantidad($carro->getCantidad()-1);
        }
        else {
            $em->remove($carro);
             
        }
        $em->flush();

        return $this->indexAction($user);
    }


     /**
     * @Route("/delete/{id}/{user}")
     */
    public function deleteAction($id,$user)
    {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('GafasBundle:Carro')
        ->findOneBy(array('producto' => $id,'user'=>$user));

        $em->remove($carro);
         
        $em->flush();

   
        return $this->indexAction($user);
    }

    /**
     * @Route("/limpiar/{user}")
     */
    public function cleanAction($user)
    {

        $em = $this->getDoctrine()->getManager();
        $carro = $em->getRepository('GafasBundle:Carro')
        ->findBy(array('user'=>$user));
        $long= count($carro);
        for($i=0;$i<$long;$i++){
        $em->remove($carro[$i]);
        }
        $em->flush();

        return $this->indexAction($user);
    }

}
