<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace First\GodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity * */
class Comment
{

              /** @ORM\Id 
               * @ORM\GeneratedValue 
               * @ORM\Column(type="integer") 
               * * */
              protected $id;

              /** @ORM\Column(type="text") * */
              protected $comment;

              /**
               * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
               * */
              protected $post;

              public function __construct(Post $post, $text)
              {
                            $this->post = $post;
                            $this->comment = $text;
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
               * Set comment
               *
               * @param text $comment
               */
              public function setComment($comment)
              {
                            $this->comment = $comment;
              }

              /**
               * Get comment
               *
               * @return text 
               */
              public function getComment()
              {
                            return $this->comment;
              }

              /**
               * Set post
               *
               * @param First\GodBundle\Entity\Post $post
               */
              public function setPost(\First\GodBundle\Entity\Post $post)
              {
                            $this->post = $post;
              }

              /**
               * Get post
               *
               * @return First\GodBundle\Entity\Post 
               */
              public function getPost()
              {
                            return $this->post;
              }

}