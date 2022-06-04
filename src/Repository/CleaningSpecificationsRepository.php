<?php

namespace App\Repository;

use App\Entity\CleaningSpecifications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CleaningSpecifications>
 *
 * @method CleaningSpecifications|null find($id, $lockMode = null, $lockVersion = null)
 * @method CleaningSpecifications|null findOneBy(array $criteria, array $orderBy = null)
 * @method CleaningSpecifications[]    findAll()
 * @method CleaningSpecifications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CleaningSpecificationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CleaningSpecifications::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CleaningSpecifications $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(CleaningSpecifications $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CleaningSpecifications[] Returns an array of CleaningSpecifications objects
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
    public function findOneBySomeField($value): ?CleaningSpecifications
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
