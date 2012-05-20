<?php

namespace First\GodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * First\GodBundle\Entity\Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{

        /**
         * @var integer $id
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @var string $name
         * @Assert\NotBlank()
         * @ORM\Column(name="name", type="string", length=12)
         */
        private $name;

        /**
         * @ORM\OneToMany(targetEntity="Product", mappedBy="category")
         */
        protected $products;

        public function __construct()
        {
                $this->products = new ArrayCollection();
        }

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
         */
        public function setName($name)
        {
                $this->name = $name;
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


}