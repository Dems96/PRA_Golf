<?php

namespace App\Repository;

use App\Entity\Golf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Golf|null find($id, $lockMode = null, $lockVersion = null)
 * @method Golf|null findOneBy(array $criteria, array $orderBy = null)
 * @method Golf[]    findAll()
 * @method Golf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GolfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Golf::class);
    }

    // /**
    //  * @return Golf[] Returns an array of Golf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Golf
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
