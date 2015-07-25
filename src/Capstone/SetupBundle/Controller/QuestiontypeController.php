<?php

namespace Capstone\SetupBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Capstone\SetupBundle\Entity\Questiontype;
use Capstone\SetupBundle\Form\QuestiontypeType;

/**
 * Questiontype controller.
 *
 */
class QuestiontypeController extends Controller
{

    /**
     * Lists all Questiontype entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SetupBundle:Questiontype')->findAll();

        return $this->render('SetupBundle:Questiontype:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Questiontype entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Questiontype();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('questiontype_show', array('id' => $entity->getQuestionType())));
        }

        return $this->render('SetupBundle:Questiontype:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Questiontype entity.
     *
     * @param Questiontype $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Questiontype $entity)
    {
        $form = $this->createForm(new QuestiontypeType(), $entity, array(
            'action' => $this->generateUrl('questiontype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Questiontype entity.
     *
     */
    public function newAction()
    {
        $entity = new Questiontype();
        $form   = $this->createCreateForm($entity);

        return $this->render('SetupBundle:Questiontype:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Questiontype entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Questiontype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questiontype entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SetupBundle:Questiontype:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Questiontype entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Questiontype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questiontype entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SetupBundle:Questiontype:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Questiontype entity.
    *
    * @param Questiontype $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Questiontype $entity)
    {
        $form = $this->createForm(new QuestiontypeType(), $entity, array(
            'action' => $this->generateUrl('questiontype_update', array('id' => $entity->getQuestionType())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Questiontype entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SetupBundle:Questiontype')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Questiontype entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('questiontype_edit', array('id' => $id)));
        }

        return $this->render('SetupBundle:Questiontype:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Questiontype entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SetupBundle:Questiontype')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Questiontype entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('questiontype'));
    }

    /**
     * Creates a form to delete a Questiontype entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('questiontype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
