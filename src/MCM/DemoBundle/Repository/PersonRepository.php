<?php

namespace MCM\DemoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function findAllOrderedByName()
    {
        return $res =  $this->getEntityManager()
                            ->createQuery(
                                'SELECT p FROM MCMDemoBundle:Person p ORDER BY p.name DESC'
                            )
                            ->getResult();        
    }
}

