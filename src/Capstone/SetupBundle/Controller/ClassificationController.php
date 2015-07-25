<?php

namespace Capstone\SetupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Capstone\SetupBundle\Entity\Classification;
use Capstone\SetupBundle\Form\ClassificationType;

/**
 * Classification controller.
 *
 */
class ClassificationController extends Controller
{

    /**
     * Lists all Classification entities.
     *
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SetupBundle:Classification')->findAll();

        return $this->render('SetupBundle:Classification:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Classification entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Classification();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('classification_show', array('id' => $entity->getClassificationIq())));
        }

        return $this->render('SetupBundle:Classification:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Classification entity.
     *
     * @param Classification $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Classification $entity)
    {
        $form = $this->createForm(new ClassificationType(), $entity, array(
            'action' => $this->generateUrl('classification_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Classification entity.
     *
     */
    public function newAction()
    {
        $entity = new Classification();
        $form   = $this->createCreateForm($entity);

        return $this->render('SetupBundle:Classification:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Classification entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Classification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classification entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SetupBundle:Classification:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Classification entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Classification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classification entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SetupBundle:Classification:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Classification entity.
    *
    * @param Classification $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Classification $entity)
    {
        $form = $this->createForm(new ClassificationType(), $entity, array(
            'action' => $this->generateUrl('classification_update', array('id' => $entity->getClassificationIq())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Classification entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Classification')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Classification entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('classification_edit', array('id' => $id)));
        }

        return $this->render('SetupBundle:Classification:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Classification entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SetupBundle:Classification')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Classification entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('classification'));
    }

    /**
     * Creates a form to delete a Classification entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classification_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
