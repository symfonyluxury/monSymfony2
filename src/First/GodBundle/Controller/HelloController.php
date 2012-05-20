<?php

namespace First\GodBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Request,
    Symfony\Component\HttpFoundation\Response,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Method,
    First\GodBundle\Form\ProductType,
    First\GodBundle\Entity\User,
    First\GodBundle\Entity\Comment,
    First\GodBundle\Entity\Category,
    First\GodBundle\Entity\Product,
    First\GodBundle\Entity\Post;

/**
 * @Route("/First")
 * @Cache(expires="+3 days")
 */
class HelloController extends Controller
{

        /**
         * @Route("/User")
         * @Template
         */
        public function indexAction(Request $request)
        {
                $em = $this->getDoctrine()->getEntityManager();
                $user = $this->getDoctrine()->getRepository( 'FirstGodBundle:User' );
                $u_result = $user->find( 9 );
                $u_result1 = $user->findAll();
                $u_result2 = $user->findBy( array('name' => 'CP3', 'id' => 14) );
                $u_result3 = $user->findOneBy( array('name' => 'CP3') );
                $u_result4 = $user->findOneByName( 'CP3' );
//                            var_dump( $u_result );
//                            var_dump( $u_result1 );
//                            var_dump( $u_result2 );
//                            var_dump( $u_result3 );
//                            var_dump( $u_result4 );
                if ( ! $u_result)
                {
                        throw $this->createNotFoundException( 'no user found for this id 9' ); //404
                        throw new \Exception( 'something get wrong' );  //500
                }

//                            var_dump($request->getAcceptableContentTypes());
//                            var_dump($request->getBasePath()); // 返回目录路径 如 http://localhost/web/index.php => 'web'否则空
//                            var_dump($request->getBaseUrl()); 
//                            var_dump($request->getScriptName()); 
//                            var_dump($request->getClientIp()); 
//                            var_dump($request->getContent()); 
//                            var_dump($request->getHost()); 
//                            var_dump($request->getLanguages()); 
//                            var_dump($request->getPathInfo()); ///wtfHello'
//                            var_dump($request->getPort());
//                            var_dump($request->getQueryString());
//                            var_dump($request->getRequestFormat());
//                            var_dump($request->getRequestUri()); ///wtfHello?gaga=nima
//                            var_dump($request->getScheme()); //http...
//                            var_dump($request->getScriptName());  // /app.php
//                            var_dump($request->getUri());  //http://symfonytest.au/wtfHello?gaga=nima

                $this->get( 'session' )->set( 'foo', 'bar' );
                echo $session = $this->get( 'session' )->get( 'foo' );

//                            $response = new Response(json_encode(array('name'=>'gaga')));
//                            $response->headers->set('Content-Type', 'application/json');

                echo $request->isSecure();
                echo $request->isXmlHttpRequest();

                $request->query->get( 'this is get query string' );
                $request->request->get( 'this is post query string' );

                $post = $this->getDoctrine()->getRepository( 'FirstGodBundle:Post' );
                $repo_user = $post->findBy( array('body' => 'lorme category!!', 'title' => 'gaga'), array('title' => 'DESC') );
                var_dump( $repo_user );

                $dql = "SELECT sum(p.id) AS comments " .
                        "FROM FirstGodBundle:Post p";
                $results = $em->createQuery( $dql )->getResult();
                var_dump( $results );

                $posts = $em->getRepository( 'FirstGodBundle:Post' )
                        ->findAllLager19();
                var_dump( $posts );

                $w_post = $post->find( 5 );
                $which_user = $w_post->getAuthor()->getName();
                var_dump( $which_user );
                echo get_class( $w_post->getAuthor() );

//                            $category = new Category();
//                            $category->setName( 'Mainly' );
//                            $product = new Product();
//                            $product->setName( 'Foo' );
//                            $product->setPrice( 19.99 );
//                            $product->setDescription( '不行就切JJ' );
//                            // relate this product to the category
//                            $product->setCategory( $category );
//                            $em->persist( $category );
//                            $em->persist( $product );
//                $lifecircletest = new User( '我操啊' );
//                $em->persist( $lifecircletest );
//
//                $em->flush();

                $userModel = new User( 'Griffen' );
                $form = $this->createFormBuilder( $userModel )
                        ->add( 'name', 'text', array('label' => 'wtf ur name?', 'required' => true, 'max_length' => 5) )
                        ->add( 'date', 'date' )
                        ->getForm();


//                return $this->render( 'FirstGodBundle:Hello:index.html.twig', array('form' => $form->createView(), 'users' => range( 1, 10 )) );
                return array('form' => $form->createView(), 'users' => range( 1, 10 ));
        }

        /**
         *
         * @Route("/new", name="FirstGodBundle_new")
         * @Method("POST") 
         */
        public function createAction(Request $request)
        {
                $userModel = new User( '' );
                $form = $this->createForm( new \First\GodBundle\Form\UserType(), $userModel );

                if ($request->getMethod() == 'POST')
                {
//                        var_dump( $form );
//                        exit();
                        $form->bindRequest( $request );

                        if ($form->isValid())
                        {
                                $em = $this->getDoctrine()->getEntityManager();
                                $em->persist( $userModel );
                                $em->flush();

                                $this->get( 'session' )->setFlash( 'note', 'You are succussful create a user!' );

                                return $this->redirect( $this->generateUrl( 'FirstGodBundle_homepage' ) );
                        }
                }
        }

        public function productAction(Request $request)
        {
                $product = new Product();
                $form = $this->createForm( new ProductType(), $product );


                return $this->render( 'FirstGodBundle:Hello:new.html.twig', array('form' => $form->createView()) );
        }

        public function new_productAction(Request $request)
        {
                $product = new Product();
                $form = $this->createForm( new ProductType(), $product );

                if ($request->getMethod() == 'POST')
                {
                        $form->bindRequest( $request );
                        if ($form->isValid())
                        {
                                $em = $this->getDoctrine()->getEntityManager();
                                $em->persist( $product );
                                $em->flush();

                                $this->get( 'session' )->setFlash( 'note', 'You are succussful create a product!' );

                                return $this->redirect( $this->generateUrl( 'FirstGodBundle_homepage' ) );
                        }
                }
//                            return $this->render( 'FirstGodBundle:Hello:new.html.twig', array('ret' => $ret) );
        }

}
