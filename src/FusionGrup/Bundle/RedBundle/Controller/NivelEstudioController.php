<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\NivelEstudio;
use FusionGrup\Bundle\RedBundle\Form\NivelEstudioType;

/**
 * NivelEstudio controller.
 *
 * @Route("/nivelestudio")
 */
class NivelEstudioController extends Controller
{

    /**
     * Lists all NivelEstudio entities.
     *
     * @Route("/", name="nivelestudio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:NivelEstudio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new NivelEstudio entity.
     *
     * @Route("/", name="nivelestudio_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:NivelEstudio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new NivelEstudio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nivelestudio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a NivelEstudio entity.
     *
     * @param NivelEstudio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(NivelEstudio $entity)
    {
        $form = $this->createForm(new NivelEstudioType(), $entity, array(
            'action' => $this->generateUrl('nivelestudio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new NivelEstudio entity.
     *
     * @Route("/new", name="nivelestudio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new NivelEstudio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a NivelEstudio entity.
     *
     * @Route("/{id}", name="nivelestudio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:NivelEstudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelEstudio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing NivelEstudio entity.
     *
     * @Route("/{id}/edit", name="nivelestudio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:NivelEstudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelEstudio entity.');
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
    * Creates a form to edit a NivelEstudio entity.
    *
    * @param NivelEstudio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(NivelEstudio $entity)
    {
        $form = $this->createForm(new NivelEstudioType(), $entity, array(
            'action' => $this->generateUrl('nivelestudio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing NivelEstudio entity.
     *
     * @Route("/{id}", name="nivelestudio_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:NivelEstudio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:NivelEstudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find NivelEstudio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nivelestudio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a NivelEstudio entity.
     *
     * @Route("/{id}", name="nivelestudio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:NivelEstudio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find NivelEstudio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nivelestudio'));
    }

    /**
     * Creates a form to delete a NivelEstudio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nivelestudio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
