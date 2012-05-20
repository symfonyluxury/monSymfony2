<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace First\GodBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
    First\GodBundle\Entity\User,
    First\GodBundle\Entity\Comment,
    First\GodBundle\Entity\Post;

class FixturesLoader implements FixtureInterface
{

              public function load($em)
              {
                            for ($i = 0; $i < 10; $i ++ )
                            {
                                          $user = new User( 'CP3' );
                                          $post = new Post( $user );
                                          $post->setTitle( 'wo ca' );
                                          $post->setBody( 'lorme ri a !!' );

                                          $post->addComment( "First.." );
                                          $post->addComment( "Second!" );

                                          $em->persist( $user );
                                          $em->persist( $post );
                            }
                            $em->flush();
              }

}
