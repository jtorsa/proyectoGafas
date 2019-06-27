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

        //Recuperar el Manager
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('GafasBundle:Gafas');
        $gafas = $repository->findAll();
        return $this->render('@Gafas/Default/index.html.twig',['gafas'=>$gafas]);
    }
}