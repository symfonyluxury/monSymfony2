<?php

namespace Google\OauthBundle\Entity;

use Fp\OpenIdBundle\Model\UserManager,
    Google\OauthBundle\Entity\User,
    Doctrine\ORM\EntityManager,
    Fp\OpenIdBundle\Entity\IdentityManager,
    Google\OauthBundle\Entity\OpenIdIdentity;

class OpenIdUserManager extends UserManager
{

      protected $identityManager;
      protected $em;

      public function __construct(EntityManager $em, IdentityManager $identityManager)
      {
            $this->identityManager = $identityManager;
            $this->em = $em;
      }

      public function createUserFromIdentity($identity, array $attributes = array())
      {
            //put your user creation logic here
            $user = new User();
            $user->setEmail( isset( $attributes['contact/email'] ) ? $attributes['contact/email'] : ''  );
//            $factory = $this->get( 'security.encoder_factory' );
//            $encoder = $factory->getEncoder( $user );
//            $password = $encoder->encodePassword( 'lichenpass', $user->getSalt() );
            $user->setPassword( 'haha' );
            if ($attributes['contact/email'])
            {
                  $username = explode( "@", $attributes['contact/email'] );
            }
            $user->setUsername( $username[0] );


            $openid = new OpenIdIdentity();
            $openid->setIdentity( $identity );
            $openid->setAttributes( $attributes );
            $openid->setUser( $user );
            $this->em->persist( $user );
            $this->em->persist( $openid );
            $this->em->flush();
            return $user; // must always return UserInterface instance or throw an exception.
      }

}

?>