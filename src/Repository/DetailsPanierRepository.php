<?php

namespace App\Repository;

use App\Entity\DetailsPanier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DetailsPanier|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailsPanier|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailsPanier[]    findAll()
 * @method DetailsPanier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailsPanierRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DetailsPanier::class);
    }

//    /**
//     * @return DetailsPanier[] Returns an array of DetailsPanier objects
//     */
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
    public function findOneBySomeField($value): ?DetailsPanier
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
