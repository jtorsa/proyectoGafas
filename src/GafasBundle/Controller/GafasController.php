<?php

namespace GafasBundle\Controller;

use GafasBundle\Entity\Gafas;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gafa controller.
 *
 * @Route("admin/gafa")
 */
class GafasController extends Controller
{
    /**
     * Lists all gafa entities.
     *
     * @Route("/", name="gafas_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $gafas = $em->getRepository('GafasBundle:Gafas')->findAll();

        return $this->render('gafas/index.html.twig', array(
            'gafas' => $gafas,
        ));
    }

    /**
     * Creates a new gafa entity.
     *
     * @Route("/nueva", name="gafas_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gafa = new Gafas();
        $form = $this->createForm('GafasBundle\Form\GafasType', $gafa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gafa);
            $em->flush();

            return $this->redirectToRoute('gafas_show', array('id' => $gafa->getId()));
        }

        return $this->render('gafas/new.html.twig', array(
            'gafa' => $gafa,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a gafa entity.
     *
     * @Route("/{id}", name="gafas_show")
     * @Method("GET")
     */
    public function showAction(Gafas $gafa)
    {
        $deleteForm = $this->createDeleteForm($gafa);

        return $this->render('gafas/show.html.twig', array(
            'gafa' => $gafa,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gafa entity.
     *
     * @Route("/{id}/edit", name="gafas_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Gafas $gafa)
    {
        $deleteForm = $this->createDeleteForm($gafa);
        $editForm = $this->createForm('GafasBundle\Form\GafasType', $gafa);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gafas_edit', array('id' => $gafa->getId()));
        }

        return $this->render('gafas/edit.html.twig', array(
            'gafa' => $gafa,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gafa entity.
     *
     * @Route("borrar/{id}", name="gafas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Gafas $gafa)
    {
        $form = $this->createDeleteForm($gafa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gafa);
            $em->flush();
        }

        return $this->redirectToRoute('gafas_index');
    }

    /**
     * Creates a form to delete a gafa entity.
     *
     * @param Gafas $gafa The gafa entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Gafas $gafa)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gafas_delete', array('id' => $gafa->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
