<?php

namespace App\Repository;

use App\Entity\DurabilitySpecifications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DurabilitySpecifications>
 *
 * @method DurabilitySpecifications|null find($id, $lockMode = null, $lockVersion = null)
 * @method DurabilitySpecifications|null findOneBy(array $criteria, array $orderBy = null)
 * @method DurabilitySpecifications[]    findAll()
 * @method DurabilitySpecifications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DurabilitySpecificationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DurabilitySpecifications::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DurabilitySpecifications $entity, bool $flush = true): void
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
    public function remove(DurabilitySpecifications $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DurabilitySpecifications[] Returns an array of DurabilitySpecifications objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DurabilitySpecifications
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
