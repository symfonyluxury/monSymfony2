<?php

namespace Google\OauthBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Symfony\Component\Security\Core\User\UserInterface,
    Fp\OpenIdBundle\Entity\UserIdentity as BaseUserIdentity,
    Fp\OpenIdBundle\Model\UserIdentityInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="openid_identities")
 */
class OpenIdIdentity extends BaseUserIdentity
{

      /**
       * @ORM\Id
       * @ORM\Column(type="integer")
       * @ORM\GeneratedValue(strategy="AUTO")
       */
      protected $id;

      /**
       * @var Symfony\Component\Security\Core\User\UserInterface
       *
       * @ORM\OneToOne(targetEntity="Google\OauthBundle\Entity\User")
       * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
       */
      protected $user;

      public function __construct()
      {
            parent::__construct();
            // your own logic
      }

//      /**
//       * Get id
//       *
//       * @return integer 
//       */
//      public function getId()
//      {
//            return $this->id;
//      }

//      /**
//       * Set user
//       *
//       * @param Google\OauthBundle\Entity\User $user
//       * @return OpenIdIdentity
//       */
//      public function setUser(\Google\OauthBundle\Entity\User $user = null)
//      {
//            $this->user = $user;
//            return $this;
//      }
//
//      /**
//       * Get user
//       *
//       * @return Google\OauthBundle\Entity\User 
//       */
//      public function getUser()
//      {
//            return $this->user;
//      }

}