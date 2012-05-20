<?php

namespace First\GodBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProductType extends AbstractType
{

        public function buildForm(FormBuilder $builder, array $options)
        {
                $builder
                        ->add( 'name', null, array('label' => 'choose ur name') )
                        ->add( 'price', null, array('label' => 'choose ur price') )
                        ->add( 'description', null, array('label' => 'choose ur des') )
                        ->add( 'category', new CategoryType(), array('label' => 'choose ur category') )
                ;
        }

        public function getDefaultOptions()
        {
                return array(
                          'data_class' => 'First\GodBundle\Entity\Product',
                );
        }

        public function getName()
        {
                return 'product';
        }

}
