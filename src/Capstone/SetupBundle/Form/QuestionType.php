<?php

namespace Capstone\SetupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Capstone\FileBundle\Form\DocumentType;
use Doctrine\ORM\EntityRepository;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('points','choice', array(
			'choices'=>array (1=>'1',2=>'2',3=>'3',4=>'4',5=>'5')
			))
            ->add('difficulty', 'choice', array (
			'choices' => array ('l'=>'Low', 'm'=>'Medium','h'=>'High')))
            ->add('linkedQuestions')
            ->add('question')
            ->add('answer', 'choice', array (
			'choices' => array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D', 'E'=>'E', 'F'=>'F')))
            ->add('mostCorrectAnswer','choice', array (
			'choices' => array('A'=>'A', 'B'=>'B', 'C'=>'C', 'D'=>'D', 'E'=>'E', 'F'=>'F')))
            ->add('questionType')
            ->add('doc', 'entity', array(
            'class'=>'Capstone\FileBundle\Entity\Document',
            'query_builder'=>function (EntityRepository $er) {
	      return $er->createQueryBuilder('u')
	      
	      ->orderBy('u.id','ASC');
            }
            ));
       
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Capstone\SetupBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'capstone_setupbundle_question';
    }
}
