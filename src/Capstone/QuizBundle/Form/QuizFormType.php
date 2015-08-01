<?php

namespace Capstone\QuizBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuizFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('A', 'submit', array('label' => 'A'))
	    ->add('B', 'submit', array('label' => 'B'))
	    ->add('C', 'submit', array('label' => 'C'))
	    ->add('D', 'submit', array('label' => 'D'))
	    ->add('E', 'submit', array('label' => 'E'))
	    ->add('F', 'submit', array('label' => 'F'))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Capstone\SetupBundle\Entity\QuizQuestion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'capstone_setupbundle_quizquestion;
    }
}
 
