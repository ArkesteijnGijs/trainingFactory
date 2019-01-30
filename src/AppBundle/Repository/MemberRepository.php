<?php
/**
 * Created by PhpStorm.
 * User: 302543540
 * Date: 1/28/2019
 * Time: 10:22 AM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class MemberRepository extends EntityRepository
{
    public function findByRoles($role){
        $qb=$this->_em->createQueryBuilder();
        $qb->select('u')
            ->from($this->_entityName, 'u')
            ->where('u.roles LIKE :roles')
            ->setParameter('roles', '%"'.$role.'"%');

        return $qb->getQuery()->getResult();

    }
}