<?php

namespace Capstone\FileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Capstone\SetupBundle\Entity\Question;
use Capstone\SetupBundle\Form\QuestionType;
use Capstone\FileBundle\Entity\Document;
use Capstone\FileBundle\Form\DocumentType;

class MergedType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
    
     $builder->add('document', new QuestionType());
     // $builder->add('question');
    
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
        return 'capstone_filebundle_document';
    }
}