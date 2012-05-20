<?php

namespace First\GodBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs,
    First\GodBundle\Entity\User,
    First\GodBundle\Entity\Category;

/**
 * Description of AddCategoryByUser
 *
 * @author cc
 */
class AddCategoryByUser
{

              public function postPersist(LifecycleEventArgs $args)
              {
                            $entity = $args->getEntity();
                            $em = $args->getEntityManager();

                            if ($entity instanceof User)
                            {
                                          $cat = new Category();
                                          $cat->setName('监听器测试成功！');
                                          $em->persist($cat);
                                          $em->flush();
                            }
              }

}

?>