<?php

namespace Capstone\SetupBundle\Form;

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
            'data_class' => 'Capstone\SetupBundle\Entity\Questiontype'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'capstone_setupbundle_questiontype';
    }
}
