<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace First\GodBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="First\GodBundle\Repository\PostRepository")
 */
class Post
{

              /** @ORM\Id 
               * @ORM\GeneratedValue 
               * @ORM\Column(type="integer") * */
              protected $id;

              /** @ORM\Column(type="string") * */
              protected $title;

              /** @ORM\Column(type="text") * */
              protected $body;

              /**
               * @ORM\ManyToOne(targetEntity="User")
               * */
              protected $author;

              /**
               * @ORM\OneToMany(targetEntity="Comment", mappedBy="posts",
               *   cascade={"persist"})
               * */
              protected $comments;

              public function __construct(User $author)
              {
                            $this->author = $author;
                            $this->posts = new ArrayCollection();
              }

              public function addComment($text)
              {
                            $this->comments[] = new Comment( $this, $text );
              }

              public function getTitle()
              {
                            return $this->title;
              }

              public function setTitle($title)
              {
                            $this->title = $title;
              }

              public function getBody()
              {
                            return $this->body;
              }

              public function setBody($body)
              {
                            $this->body = $body;
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
               * Set author
               *
               * @param First\GodBundle\Entity\User $author
               */
              public function setAuthor(\First\GodBundle\Entity\User $author)
              {
                            $this->author = $author;
              }

              /**
               * Get author
               *
               * @return First\GodBundle\Entity\User 
               */
              public function getAuthor()
              {
                            return $this->author;
              }

              /**
               * Get comments
               *
               * @return Doctrine\Common\Collections\Collection 
               */
              public function getComments()
              {
                            return $this->comments;
              }

}