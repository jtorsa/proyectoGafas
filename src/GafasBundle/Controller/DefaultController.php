<?php

namespace GafasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    
    /**
     * @Route("/gafas")
     */
class DefaultController extends Controller
{
    private $em;

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('@Gafas/Default/index.html.twig');
    }
    

    /**
     * @Route("/getAll")
     */
    public function getAllAction(){
        try{
        //Recuperar el Manager
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('GafasBundle:Gafas');
        $gafas = $repository->findAll();
        $repository2= $em->getRepository('GafasBundle:Categoria');
        $categorias = $repository2->findAll();
        return $this->render('@Gafas/Default/index.html.twig',['gafas'=>$gafas,'categorias'=>$categorias]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * @Route("/detail/{id}")
     */
    public function getPostById($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository= $em->getRepository("GafasBundle:Gafas");
        $gafa = $repository->find($id);
        return $this->render('@Gafas/Default/detail.html.twig',['gafa'=>$gafa]);
    }
}