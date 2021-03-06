<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street', 'text')
            ->add('nbr', 'text')
            ->add('box', 'text', array('required' => false))
            ->add('postal', 'text')
            ->add('city', 'text')
            ->add('region', 'text', array('required' => false))
            ->add('country', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Location'
        ));
    }

    public function getName()
    {
        return 'location';
    }
}