<?php

namespace App\Repository;

use App\Entity\IssuePriority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssuePriority|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssuePriority|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssuePriority[]    findAll()
 * @method IssuePriority[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssuePriorityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssuePriority::class);
    }

    // /**
    //  * @return IssuePriority[] Returns an array of IssuePriority objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?IssuePriority
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
