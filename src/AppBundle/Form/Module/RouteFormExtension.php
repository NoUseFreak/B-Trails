<?php

namespace AppBundle\Form\Module;

use Clastic\NodeBundle\Form\Extension\AbstractNodeTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * RouteTypeExtension
 */
class RouteFormExtension extends AbstractNodeTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->getTabHelper($builder)->findTab('general')
            ->add('description', 'wysiwyg', array('required' => true))
            ->add('distance', 'number', array('required' => true))
            ->add('color', 'entity', array(
                'class' => 'AppBundle:Color',
                'property_path' => 'color',
                'label' => 'Color',
                'required' => false,
            ))
            ->add('shape', 'entity', array(
                'class' => 'AppBundle:Shape',
                'property_path' => 'shape',
                'label' => 'Shape',
                'required' => false,
            ))
            ->add('gpxFile', 'file');

        $this->getTabHelper($builder)->createTab('route_location', 'Location', array(
            'position' => array('after' => 'general')
        ))
            ->add('location', 'location');
    }
}
