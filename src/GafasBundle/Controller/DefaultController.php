<?php

namespace GafasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/gafas")
     */
    public function indexAction()
    {
        return $this->render('@Gafas/Default/index.html.twig');
    }
}