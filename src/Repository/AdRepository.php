<?php

namespace App\Repository;

use App\Entity\Ad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ad[]    findAll()
 * @method Ad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ad::class);
    }


    // /**
    //  * @return Ad[] Returns an array of Ad objects
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
    public function findOneBySomeField($value): ?Ad
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findBySearch($houseType,$max,$min,$city,$type)
    {
        
        return $this->createQueryBuilder('ad')
        ->join('ad.city','c')
        ->join('ad.house_type', 'h')
        ->where('h.name = :houseType')
        ->andWhere('ad.price <= :maxPrice','ad.price >= :minPrice','c.id =:city','ad.ad_type = :adType')
        ->setParameter('minPrice', $min)
        ->setParameter('maxPrice', $max)
        ->setParameter('houseType', $houseType)
        ->setParameter('city', $city)
        ->setParameter('adType', $type)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByFullSearch2($adHouseType,$maxPrice,$minPrice,$city,$adType,$roomNumber,$surface,$bathroom)
    {
        return $this->createQueryBuilder('ad')
        ->join('ad.city','c')
        ->join('ad.house_type', 'h')
        ->join('ad.supplement', 's')
        ->where('h.name = :houseType')
        ->andWhere('ad.price <= :maxPrice','ad.price >= :minPrice','c.id =:city','ad.ad_type = :adType')
        ->andWhere('s.rooms_number >= :roomNumber', 'ad.surface >= :surface', 's.bathroom >= :bathroom')
        ->setParameter('minPrice', $minPrice)
        ->setParameter('maxPrice', $maxPrice)
        ->setParameter('houseType', $adHouseType)
        ->setParameter('city', $city)
        ->setParameter('roomNumber' , $roomNumber)
        ->setParameter('surface', $surface)
        ->setParameter('bathroom', $bathroom)
        ->setParameter('adType', $adType)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByFullSearch1($adHouseType,$maxPrice,$minPrice,$city,$adType,$distance,$roomNumber,$surface,$bathroom)
    {
        return $this->createQueryBuilder('ad')
        ->join('ad.city','c')
        ->join('ad.house_type', 'h')
        ->join('ad.supplement', 's')
        ->addSelect
        ('(6353 * 2 * ASIN(SQRT( POWER(SIN((ad.latitude - :cityLat) 
        *  pi()/180 / 2), 2) 
        +COS(ad.latitude * pi()/180) * COS(:cityLat* pi()/180) 
        * POWER(SIN((ad.longitude - :cityLong) 
        * pi()/180 / 2), 2) ))) 
        AS HIDDEN distance')
        ->where('h.name = :houseType')
        ->andWhere('ad.price <= :maxPrice','ad.price >= :minPrice','ad.ad_type = :adType')
        ->andWhere('s.rooms_number >= :roomNumber', 'ad.surface >= :surface', 's.bathroom >= :bathroom')
        ->andHaving('distance <= :dist')
        ->setParameter('minPrice', $minPrice)
        ->setParameter('maxPrice', $maxPrice)
        ->setParameter('houseType', $adHouseType)
        ->setParameter('roomNumber' , $roomNumber)
        ->setParameter('surface', $surface)
        ->setParameter('bathroom', $bathroom)
        ->setParameter('adType', $adType)
        ->setParameter('cityLat', $city->getLatitude())
        ->setParameter('cityLong', $city->getLongitude())
        ->setParameter('dist', $distance)
            ->getQuery()
            ->getResult()
        ;
    }
}
