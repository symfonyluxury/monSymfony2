<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace First\GodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity 
 * @ORM\HasLifecycleCallbacks
 */
class User
{

        /** @ORM\Id 
         * @ORM\GeneratedValue 
         * @ORM\Column(type="integer") 
         * * */
        protected $id;

        /** @ORM\Column(type="string") * */
        protected $name;

        /** @ORM\Column(type="datetime", name="reg_date", nullable=false)* */
        protected $date;

        public function __construct($name)
        {
                empty( $name )? : $this->name = $name;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;
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
         * Set date
         *
         * @param date $date
         */
        public function setDate($date)
        {
                $this->date = $date;
        }

        /**
         * Get date
         *
         * @return date 
         */
        public function getDate()
        {
                return $this->date;
        }

        /** @ORM\PrePersist */
        public function setDateValue(\DateTime $date = null)
        {
                $this->date = $date; //可自动识别是date还是datetime类型
        }

}