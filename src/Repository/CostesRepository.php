<?php

namespace App\Repository;

use App\Entity\Costes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Costes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Costes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Costes[]    findAll()
 * @method Costes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CostesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Costes::class);
    }

    // /**
    //  * @return Costes[] Returns an array of Costes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Costes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
