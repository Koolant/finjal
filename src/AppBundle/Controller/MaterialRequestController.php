<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MaterialRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Materialrequest controller.
 * @Security("is_granted('ROLE_ADMIN')")
 * @Route("materialrequest")
 */
class MaterialRequestController extends Controller
{
    /**
     * Lists all materialRequest entities.
     *
     * @Route("/", name="materialrequest_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $materialRequests = $em->getRepository('AppBundle:MaterialRequest')->findAll();

        return $this->render('materialrequest/index.html.twig', array(
            'materialRequests' => $materialRequests,
        ));
    }

    /**
     * Creates a new materialRequest entity.
     *
     * @Route("/new", name="materialrequest_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $materialRequest = new Materialrequest();
        $form = $this->createForm('AppBundle\Form\MaterialRequestType', $materialRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($materialRequest);
            $em->flush();

            return $this->redirectToRoute('materialrequest_show', array('id' => $materialRequest->getId()));
        }

        return $this->render('materialrequest/new.html.twig', array(
            'materialRequest' => $materialRequest,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a materialRequest entity.
     *
     * @Route("/{id}", name="materialrequest_show")
     * @Method("GET")
     */
    public function showAction(MaterialRequest $materialRequest)
    {
        $deleteForm = $this->createDeleteForm($materialRequest);

        return $this->render('materialrequest/show.html.twig', array(
            'materialRequest' => $materialRequest,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing materialRequest entity.
     *
     * @Route("/{id}/edit", name="materialrequest_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MaterialRequest $materialRequest)
    {
        $deleteForm = $this->createDeleteForm($materialRequest);
        $editForm = $this->createForm('AppBundle\Form\MaterialRequestType', $materialRequest);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materialrequest_edit', array('id' => $materialRequest->getId()));
        }

        return $this->render('materialrequest/edit.html.twig', array(
            'materialRequest' => $materialRequest,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a materialRequest entity.
     *
     * @Route("/{id}", name="materialrequest_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MaterialRequest $materialRequest)
    {
        $form = $this->createDeleteForm($materialRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($materialRequest);
            $em->flush();
        }

        return $this->redirectToRoute('materialrequest_index');
    }

    /**
     * Creates a form to delete a materialRequest entity.
     *
     * @param MaterialRequest $materialRequest The materialRequest entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MaterialRequest $materialRequest)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('materialrequest_delete', array('id' => $materialRequest->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
