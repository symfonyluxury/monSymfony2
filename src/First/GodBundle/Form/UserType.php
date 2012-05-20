<?php

namespace First\GodBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{

        public function buildForm(FormBuilder $builder, array $options)
        {
                $builder
                        ->add( 'name' )
                        ->add( 'date' )
                ;
        }

        public function getDefaultOptions()
        {
                return array(
                          'data_class' => 'First\GodBundle\Entity\User',
                );
        }

        public function getName()
        {
                return 'user';
        }

}
