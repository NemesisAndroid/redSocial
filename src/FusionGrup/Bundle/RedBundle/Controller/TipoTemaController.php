<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\TipoTema;
use FusionGrup\Bundle\RedBundle\Form\TipoTemaType;

/**
 * TipoTema controller.
 *
 * @Route("/tipotema")
 */
class TipoTemaController extends Controller
{

    /**
     * Lists all TipoTema entities.
     *
     * @Route("/", name="tipotema")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:TipoTema')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoTema entity.
     *
     * @Route("/", name="tipotema_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:TipoTema:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoTema();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipotema_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoTema entity.
     *
     * @param TipoTema $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoTema $entity)
    {
        $form = $this->createForm(new TipoTemaType(), $entity, array(
            'action' => $this->generateUrl('tipotema_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoTema entity.
     *
     * @Route("/new", name="tipotema_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoTema();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoTema entity.
     *
     * @Route("/{id}", name="tipotema_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoTema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoTema entity.
     *
     * @Route("/{id}/edit", name="tipotema_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoTema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTema entity.');
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
    * Creates a form to edit a TipoTema entity.
    *
    * @param TipoTema $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoTema $entity)
    {
        $form = $this->createForm(new TipoTemaType(), $entity, array(
            'action' => $this->generateUrl('tipotema_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoTema entity.
     *
     * @Route("/{id}", name="tipotema_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:TipoTema:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoTema')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTema entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipotema_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoTema entity.
     *
     * @Route("/{id}", name="tipotema_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:TipoTema')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoTema entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipotema'));
    }

    /**
     * Creates a form to delete a TipoTema entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipotema_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
