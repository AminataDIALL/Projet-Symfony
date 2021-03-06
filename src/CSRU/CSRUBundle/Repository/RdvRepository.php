<?php

namespace CSRU\CSRUBundle\Repository;

/**
 * RdvRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RdvRepository extends \Doctrine\ORM\EntityRepository
{
    public function byRdv($utilisateur)
   {
       $qb = $this->createQueryBuilder('u')
               ->select('u')
               ->where('u.utilisateur = :utilisateur')
               ->orderBy('u.id')
               ->setParameter('utilisateur', $utilisateur);
       return $qb->getQuery()->getResult();
   }
}

