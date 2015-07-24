<?php

namespace Capstone\ReportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestiontypeType extends AbstractType
{

	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questiontype')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Capstone\ReportBundle\Entity\Questiontype'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'capstone_reportbundle_questiontype';
    }
}
