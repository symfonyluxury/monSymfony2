<?php

namespace Google\OauthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

          const domain = 'testGoogle.au';

          protected $email = 'chen.li@teamlogin.com';
          protected $password = '123456qqq';
          protected $username = 'cp3';
          protected $givenname = 'nima';
          protected $familyname = 'heiA';
          protected $password_c = '12345694';

          /**
           * @Route("/hello/{name}")
           * @Template()
           */
          public function indexAction($name)
          {
//                    $clientLibPath = 'C:\wamp\www\monSymfony2\vendor\Zend\gdata\library';
//                    $exe = set_include_path(get_include_path().PATH_SEPARATOR.$clientLibPath);
//                    $config = array(
//                              'adapter' => 'Zend_Http_Client_Adapter_Proxy',
//                              'proxy' => 'localhost',
//                              'proxy_port' => 3128
//                    );
//                    $proxiedHttpClient = new \Zend_Http_Client( 'http://www.google.com:443', $config );

                    $client = \Zend_Gdata_ClientLogin::getHttpClient( $this->email, $this->password, \Zend_Gdata_Gapps::AUTH_SERVICE_NAME );
//                    $service = new \Zend_Gdata_Gapps( $client, self::domain );
//                    $service->createUser( $this->username, $this->givenname, $this->familyname, $this->password_c, $passwordHashFunction = null, $quota = null );

                    return array('name' => $name);
          }

}