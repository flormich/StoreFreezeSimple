<?php

namespace App\Repository;

use App\Entity\QuantityGr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QuantityGr|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuantityGr|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuantityGr[]    findAll()
 * @method QuantityGr[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuantityGrRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QuantityGr::class);
    }

    // /**
    //  * @return QuantityGr[] Returns an array of QuantityGr objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QuantityGr
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
