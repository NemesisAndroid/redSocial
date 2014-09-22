<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\RespuestasDebate;
use FusionGrup\Bundle\RedBundle\Form\RespuestasDebateType;

/**
 * RespuestasDebate controller.
 *
 * @Route("/respuestasdebate")
 */
class RespuestasDebateController extends Controller
{

    /**
     * Lists all RespuestasDebate entities.
     *
     * @Route("/", name="respuestasdebate")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:RespuestasDebate')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new RespuestasDebate entity.
     *
     * @Route("/", name="respuestasdebate_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:RespuestasDebate:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new RespuestasDebate();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('respuestasdebate_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RespuestasDebate entity.
     *
     * @param RespuestasDebate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RespuestasDebate $entity)
    {
        $form = $this->createForm(new RespuestasDebateType(), $entity, array(
            'action' => $this->generateUrl('respuestasdebate_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RespuestasDebate entity.
     *
     * @Route("/new", name="respuestasdebate_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RespuestasDebate();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a RespuestasDebate entity.
     *
     * @Route("/{id}", name="respuestasdebate_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasDebate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasDebate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RespuestasDebate entity.
     *
     * @Route("/{id}/edit", name="respuestasdebate_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasDebate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasDebate entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a RespuestasDebate entity.
    *
    * @param RespuestasDebate $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RespuestasDebate $entity)
    {
        $form = $this->createForm(new RespuestasDebateType(), $entity, array(
            'action' => $this->generateUrl('respuestasdebate_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RespuestasDebate entity.
     *
     * @Route("/{id}", name="respuestasdebate_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:RespuestasDebate:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasDebate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasDebate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('respuestasdebate_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a RespuestasDebate entity.
     *
     * @Route("/{id}", name="respuestasdebate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:RespuestasDebate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RespuestasDebate entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('respuestasdebate'));
    }

    /**
     * Creates a form to delete a RespuestasDebate entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('respuestasdebate_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
