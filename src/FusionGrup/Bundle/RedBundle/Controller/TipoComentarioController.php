<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\TipoComentario;
use FusionGrup\Bundle\RedBundle\Form\TipoComentarioType;

/**
 * TipoComentario controller.
 *
 * @Route("/tipocomentario")
 */
class TipoComentarioController extends Controller
{

    /**
     * Lists all TipoComentario entities.
     *
     * @Route("/", name="tipocomentario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:TipoComentario')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new TipoComentario entity.
     *
     * @Route("/", name="tipocomentario_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:TipoComentario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TipoComentario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipocomentario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a TipoComentario entity.
     *
     * @param TipoComentario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(TipoComentario $entity)
    {
        $form = $this->createForm(new TipoComentarioType(), $entity, array(
            'action' => $this->generateUrl('tipocomentario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoComentario entity.
     *
     * @Route("/new", name="tipocomentario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TipoComentario();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a TipoComentario entity.
     *
     * @Route("/{id}", name="tipocomentario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoComentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing TipoComentario entity.
     *
     * @Route("/{id}/edit", name="tipocomentario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoComentario entity.');
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
    * Creates a form to edit a TipoComentario entity.
    *
    * @param TipoComentario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoComentario $entity)
    {
        $form = $this->createForm(new TipoComentarioType(), $entity, array(
            'action' => $this->generateUrl('tipocomentario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoComentario entity.
     *
     * @Route("/{id}", name="tipocomentario_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:TipoComentario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:TipoComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoComentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipocomentario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TipoComentario entity.
     *
     * @Route("/{id}", name="tipocomentario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:TipoComentario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoComentario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipocomentario'));
    }

    /**
     * Creates a form to delete a TipoComentario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocomentario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
