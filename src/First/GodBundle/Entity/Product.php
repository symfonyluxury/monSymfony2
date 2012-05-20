<?php

namespace First\GodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * First\GodBundle\Entity\Product
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="First\GodBundle\Entity\ProductRepository")
 */
class Product
{

        /**
         * @var integer $id
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @var string $name
         * @Assert\NotBlank(message="名字不能为空")
         * @ORM\Column(name="name", type="string", length=255)
         */
        private $name;

        /**
         * @var float $price
         * @Assert\NotBlank(message="价格不能为空")
         * @ORM\Column(name="price", type="float")
         */
        private $price;

        /**
         * @ORM\Column(name="description", type="text")
         * @Assert\NotBlank(message="描述不能为空")
         * @Assert\MinLength(limit=2,message="太短了")
         * @Assert\MaxLength(limit=6,message="太长了")
         */
        private $description;

        /**
         * @ORM\ManyToOne(targetEntity="Category", inversedBy="products",cascade={"persist"})
         * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
         * @Assert\Type(type="First\GodBundle\Entity\Category")
         */
        protected $category;

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

        /**
         * Set price
         *
         * @param float $price
         */
        public function setPrice($price)
        {
                $this->price = $price;
        }

        /**
         * Get price
         *
         * @return float 
         */
        public function getPrice()
        {
                return $this->price;
        }

        /**
         * Set description
         *
         * @param text $description
         */
        public function setDescription($description)
        {
                $this->description = $description;
        }

        /**
         * Get description
         *
         * @return text 
         */
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set category
         *
         * @param First\GodBundle\Entity\Category $category
         */
        public function setCategory(\First\GodBundle\Entity\Category $category)
        {
                $this->category = $category;
        }

        /**
         * Get category
         *
         * @return First\GodBundle\Entity\Category 
         */
        public function getCategory()
        {
                return $this->category;
        }

}