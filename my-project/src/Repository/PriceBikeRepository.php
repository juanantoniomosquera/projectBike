<?php

namespace App\Repository;

use App\Entity\PriceBike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PriceBike|null find($id, $lockMode = null, $lockVersion = null)
 * @method PriceBike|null findOneBy(array $criteria, array $orderBy = null)
 * @method PriceBike[]    findAll()
 * @method PriceBike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PriceBikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PriceBike::class);
    }

    // /**
    //  * @return PriceBike[] Returns an array of PriceBike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PriceBike
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}