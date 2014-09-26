<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\Debate;
use FusionGrup\Bundle\RedBundle\Form\DebateType;

/**
 * Debate controller.
 *
 * @Route("/debate")
 */
class DebateController extends Controller
{

    /**
     * Lists all Debate entities.
     *
     * @Route("/", name="debate")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:Debate')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Debate entity.
     *
     * @Route("/", name="debate_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:Debate:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Debate();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('debate_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Debate entity.
     *
     * @param Debate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Debate $entity)
    {
        $form = $this->createForm(new DebateType(), $entity, array(
            'action' => $this->generateUrl('debate_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Debate entity.
     *
     * @Route("/new", name="debate_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Debate();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Debate entity.
     *
     * @Route("/{id}", name="debate_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Debate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Debate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Debate entity.
     *
     * @Route("/{id}/edit", name="debate_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Debate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Debate entity.');
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
    * Creates a form to edit a Debate entity.
    *
    * @param Debate $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Debate $entity)
    {
        $form = $this->createForm(new DebateType(), $entity, array(
            'action' => $this->generateUrl('debate_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Debate entity.
     *
     * @Route("/{id}", name="debate_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:Debate:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Debate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Debate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('debate_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Debate entity.
     *
     * @Route("/{id}", name="debate_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:Debate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Debate entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('debate'));
    }

    /**
     * Creates a form to delete a Debate entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('debate_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
