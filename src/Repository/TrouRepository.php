<?php

namespace App\Repository;

use App\Entity\Trou;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Trou|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trou|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trou[]    findAll()
 * @method Trou[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrouRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trou::class);
    }

    // /**
    //  * @return Trou[] Returns an array of Trou objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trou
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
