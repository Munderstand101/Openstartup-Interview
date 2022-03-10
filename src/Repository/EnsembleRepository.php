<?php

namespace App\Repository;

use App\Entity\Ensemble;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ensemble|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ensemble|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ensemble[]    findAll()
 * @method Ensemble[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnsembleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ensemble::class);
    }

    // /**
    //  * @return Ensemble[] Returns an array of Ensemble objects
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
    public function findOneBySomeField($value): ?Annonces
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
