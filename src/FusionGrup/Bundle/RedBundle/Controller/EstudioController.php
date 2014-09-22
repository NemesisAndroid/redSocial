<?php

namespace FusionGrup\Bundle\RedBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FusionGrup\Bundle\RedBundle\Entity\Estudio;
use FusionGrup\Bundle\RedBundle\Form\EstudioType;

/**
 * Estudio controller.
 *
 * @Route("/estudio")
 */
class EstudioController extends Controller
{

    /**
     * Lists all Estudio entities.
     *
     * @Route("/", name="estudio")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FusionGrupRedBundle:Estudio')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Estudio entity.
     *
     * @Route("/", name="estudio_create")
     * @Method("POST")
     * @Template("FusionGrupRedBundle:Estudio:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Estudio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudio_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Estudio entity.
     *
     * @param Estudio $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Estudio $entity)
    {
        $form = $this->createForm(new EstudioType(), $entity, array(
            'action' => $this->generateUrl('estudio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Estudio entity.
     *
     * @Route("/new", name="estudio_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Estudio();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Estudio entity.
     *
     * @Route("/{id}", name="estudio_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Estudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Estudio entity.
     *
     * @Route("/{id}/edit", name="estudio_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Estudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudio entity.');
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
    * Creates a form to edit a Estudio entity.
    *
    * @param Estudio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Estudio $entity)
    {
        $form = $this->createForm(new EstudioType(), $entity, array(
            'action' => $this->generateUrl('estudio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Estudio entity.
     *
     * @Route("/{id}", name="estudio_update")
     * @Method("PUT")
     * @Template("FusionGrupRedBundle:Estudio:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FusionGrupRedBundle:Estudio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estudio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estudio_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Estudio entity.
     *
     * @Route("/{id}", name="estudio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FusionGrupRedBundle:Estudio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Estudio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudio'));
    }

    /**
     * Creates a form to delete a Estudio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
