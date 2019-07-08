<?php

namespace GafasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    
    /**
     * @Route("/")
     */
class DefaultController extends Controller
{
    private $em;
    

    /**
     * @Route("/", name="homepage")
     */
    public function getAllAction(){
        try{
        //Recuperar el Manager
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('GafasBundle:Gafas');
        //$gafas = $repository->findAll();

        $repository2= $em->getRepository('GafasBundle:Categoria');
        $categorias = $repository2->findAll();

        $query = $em->createQuery('SELECT u.id, u.model, u.image, u.price, c.name as categoria
        FROM GafasBundle:Gafas AS u , GafasBundle:Categoria as c
        WHERE u.categoria = c.id');
        $gafas= $query->getResult();

        return $this->render('@Gafas/Default/index.html.twig',['gafas'=>$gafas,'categorias'=>$categorias]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @Route("/detail/{id}")
     */
    public function getGafaById($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository= $em->getRepository("GafasBundle:Gafas");
        $gafa = $repository->find($id);
        return $this->render('@Gafas/Default/detail.html.twig',['gafa'=>$gafa]);
    }
}