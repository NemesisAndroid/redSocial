<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\DataExtra;
use FusionGrup\Bundle\RedBundle\Form\DataExtraType;

/**
 * DataExtra controller.
 *
 * @Route("/dataextra")
 */
class DataExtraController extends Controller
{

    /**
     * Lists all DataExtra entities.
     *
     * @Route("/", name="dataextra")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:DataExtra')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new DataExtra entity.
     *
     * @Route("/", name="dataextra_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:DataExtra:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new DataExtra();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dataextra_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a DataExtra entity.
     *
     * @param DataExtra $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(DataExtra $entity)
    {
        $form = $this->createForm(new DataExtraType(), $entity, array(
            'action' => $this->generateUrl('dataextra_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new DataExtra entity.
     *
     * @Route("/new", name="dataextra_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new DataExtra();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a DataExtra entity.
     *
     * @Route("/{id}", name="dataextra_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:DataExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DataExtra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing DataExtra entity.
     *
     * @Route("/{id}/edit", name="dataextra_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:DataExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DataExtra entity.');
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
    * Creates a form to edit a DataExtra entity.
    *
    * @param DataExtra $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(DataExtra $entity)
    {
        $form = $this->createForm(new DataExtraType(), $entity, array(
            'action' => $this->generateUrl('dataextra_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing DataExtra entity.
     *
     * @Route("/{id}", name="dataextra_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:DataExtra:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:DataExtra')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DataExtra entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dataextra_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a DataExtra entity.
     *
     * @Route("/{id}", name="dataextra_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:DataExtra')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DataExtra entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dataextra'));
    }

    /**
     * Creates a form to delete a DataExtra entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dataextra_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
