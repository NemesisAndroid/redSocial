<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\GeneroExtra;
use FusionGrup\Bundle\RedBundle\Form\GeneroExtraType;

/**
 * GeneroExtra controller.
 *
 * @Route("/generoextra")
 */
class GeneroExtraController extends Controller
{

    /**
     * Lists all GeneroExtra entities.
     *
     * @Route("/", name="generoextra")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:GeneroExtra')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new GeneroExtra entity.
     *
     * @Route("/", name="generoextra_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:GeneroExtra:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new GeneroExtra();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('generoextra_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a GeneroExtra entity.
     *
     * @param GeneroExtra $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(GeneroExtra $entity)
    {
        $form = $this->createForm(new GeneroExtraType(), $entity, array(
            'action' => $this->generateUrl('generoextra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GeneroExtra entity.
     *
     * @Route("/new", name="generoextra_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new GeneroExtra();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a GeneroExtra entity.
     *
     * @Route("/{id}", name="generoextra_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:GeneroExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GeneroExtra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing GeneroExtra entity.
     *
     * @Route("/{id}/edit", name="generoextra_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:GeneroExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GeneroExtra entity.');
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
    * Creates a form to edit a GeneroExtra entity.
    *
    * @param GeneroExtra $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GeneroExtra $entity)
    {
        $form = $this->createForm(new GeneroExtraType(), $entity, array(
            'action' => $this->generateUrl('generoextra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GeneroExtra entity.
     *
     * @Route("/{id}", name="generoextra_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:GeneroExtra:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:GeneroExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GeneroExtra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('generoextra_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a GeneroExtra entity.
     *
     * @Route("/{id}", name="generoextra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:GeneroExtra')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GeneroExtra entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('generoextra'));
    }

    /**
     * Creates a form to delete a GeneroExtra entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('generoextra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
