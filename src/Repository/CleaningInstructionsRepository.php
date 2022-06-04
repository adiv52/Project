<?php

namespace App\Repository;

use App\Entity\CleaningInstructions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CleaningInstructions>
 *
 * @method CleaningInstructions|null find($id, $lockMode = null, $lockVersion = null)
 * @method CleaningInstructions|null findOneBy(array $criteria, array $orderBy = null)
 * @method CleaningInstructions[]    findAll()
 * @method CleaningInstructions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CleaningInstructionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CleaningInstructions::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CleaningInstructions $entity, bool $flush = true): void
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
    public function remove(CleaningInstructions $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CleaningInstructions[] Returns an array of CleaningInstructions objects
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
    public function findOneBySomeField($value): ?CleaningInstructions
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
