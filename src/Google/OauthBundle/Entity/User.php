<?php

namespace Google\OauthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{

      /**
       * @ORM\Id
       * @ORM\Column(type="integer")
       * @ORM\GeneratedValue(strategy="AUTO")
       */
      protected $id;

      /** @ORM\Column(type="string")  * */
      protected $name;

      /** @ORM\Column(type="string")  * */
      protected $pwd;

      //put your code here

      /**
       * Get id
       *
       * @return integer 
       */
      public function getId()
      {
            return $this->id;
      }

      /**
       * Set name
       *
       * @param string $name
       * @return User
       */
      public function setName($name)
      {
            $this->name = $name;
            return $this;
      }

      /**
       * Get name
       *
       * @return string 
       */
      public function getName()
      {
            return $this->name;
      }

      /**
       * Set pwd
       *
       * @param string $pwd
       * @return User
       */
      public function setPwd($pwd)
      {
            $this->pwd = $pwd;
            return $this;
      }

      /**
       * Get pwd
       *
       * @return string 
       */
      public function getPwd()
      {
            return $this->pwd;
      }

}