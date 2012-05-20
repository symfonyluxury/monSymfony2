<?php

namespace First\HellBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('FirstHellBundle:Default:index.html.twig', array('name' => $name));
    }
}
