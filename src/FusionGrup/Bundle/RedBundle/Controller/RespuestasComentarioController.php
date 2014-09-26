<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\RespuestasComentario;
use FusionGrup\Bundle\RedBundle\Form\RespuestasComentarioType;

/**
 * RespuestasComentario controller.
 *
 * @Route("/respuestascomentario")
 */
class RespuestasComentarioController extends Controller
{

    /**
     * Lists all RespuestasComentario entities.
     *
     * @Route("/", name="respuestascomentario")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:RespuestasComentario')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new RespuestasComentario entity.
     *
     * @Route("/", name="respuestascomentario_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:RespuestasComentario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new RespuestasComentario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('respuestascomentario_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a RespuestasComentario entity.
     *
     * @param RespuestasComentario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RespuestasComentario $entity)
    {
        $form = $this->createForm(new RespuestasComentarioType(), $entity, array(
            'action' => $this->generateUrl('respuestascomentario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RespuestasComentario entity.
     *
     * @Route("/new", name="respuestascomentario_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new RespuestasComentario();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a RespuestasComentario entity.
     *
     * @Route("/{id}", name="respuestascomentario_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasComentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing RespuestasComentario entity.
     *
     * @Route("/{id}/edit", name="respuestascomentario_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasComentario entity.');
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
    * Creates a form to edit a RespuestasComentario entity.
    *
    * @param RespuestasComentario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RespuestasComentario $entity)
    {
        $form = $this->createForm(new RespuestasComentarioType(), $entity, array(
            'action' => $this->generateUrl('respuestascomentario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RespuestasComentario entity.
     *
     * @Route("/{id}", name="respuestascomentario_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:RespuestasComentario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:RespuestasComentario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RespuestasComentario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('respuestascomentario_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a RespuestasComentario entity.
     *
     * @Route("/{id}", name="respuestascomentario_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:RespuestasComentario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RespuestasComentario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('respuestascomentario'));
    }

    /**
     * Creates a form to delete a RespuestasComentario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('respuestascomentario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
