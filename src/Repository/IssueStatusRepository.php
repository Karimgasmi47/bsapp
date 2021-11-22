<?php

namespace App\Repository;

use App\Entity\IssueStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method IssueStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method IssueStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method IssueStatus[]    findAll()
 * @method IssueStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IssueStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IssueStatus::class);
    }

    // /**
    //  * @return IssueType[] Returns an array of IssueType objects
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
    public function findOneBySomeField($value): ?IssueType
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
