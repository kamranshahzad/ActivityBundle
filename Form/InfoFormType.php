<?php

namespace Kamran\ActivityBundle\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


 
 
class InfoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');
        $builder->add('url');
        $builder->add('email');
        $builder->add('username');
        $builder->add('password');
        $builder->add('note');
    }
 
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Kamran\ActivityBundle\Entity\ActivitySites',
        );
    }
 
    public function getName()
    {
        return 'siteinfo_form';
    }
}