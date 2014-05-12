<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;

class User extends EntityRepository 
{
    public function listUser()
    {
        $query = $this->getEntityManager()
                      ->createQuery(
                                "SELECT u FROM Entity\User u WHERE u.lastName = 'da Silva'"
                              );
        $users = $query->getResult();
        return $users;
    }
    
    public function listUsers()
    {
        $qb = $this->getEntityManager()
                   ->createQueryBuilder();
        
        $qb->select('u')
           ->from('Entity\User', 'u')
           ->where($qb->expr()->eq('u.lastName', '?1'))
           ->setParameter(1, 'da Silva');
        
        return $qb->getQuery()->getResult();
    }
}
