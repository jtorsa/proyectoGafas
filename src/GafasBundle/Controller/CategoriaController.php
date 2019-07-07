<?php

namespace GafasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    
    /**
     * @Route("/categoria")
     */
class CategoriaController extends Controller
{

    /**
     * @Route("/{id}")
     */
    public function getGafas($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repository= $em->getRepository('GafasBundle:Categoria');
        $categoria = $repository->find($id);
        return $this->render('@Gafas/Default/index.html.twig',['gafas'=>$categoria->getGafas()]);
    }


}