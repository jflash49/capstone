<?php

namespace Capstone\SetupBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserInfoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('birthdate')
            ->add('gender')
            ->add('school')
            ->add('class')
            ->add('parish')
            ->add('iQ')
            ->add('owner')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Capstone\SetupBundle\Entity\UserInfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'capstone_setupbundle_userinfo';
    }
}
