<?php

namespace App\Repository;

use App\Entity\AdSupplement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdSupplement|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdSupplement|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdSupplement[]    findAll()
 * @method AdSupplement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdSupplementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdSupplement::class);
    }

    // /**
    //  * @return AdSupplement[] Returns an array of AdSupplement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdSupplement
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
