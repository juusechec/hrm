<?php

namespace App\Repository;

use App\Entity\AgreeableElephant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AgreeableElephant|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgreeableElephant|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgreeableElephant[]    findAll()
 * @method AgreeableElephant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgreeableElephantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgreeableElephant::class);
    }

    // /**
    //  * @return AgreeableElephant[] Returns an array of AgreeableElephant objects
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
    public function findOneBySomeField($value): ?AgreeableElephant
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
