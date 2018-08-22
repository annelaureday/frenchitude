<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    /**
    * @return Produits[] Returns an array of Produits objects
     */
/*
    public function findAllId($id): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id < :id')
            ->setParameter('id', $id)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
*/

    
    public function findOneById($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id < :id')
            ->setParameter('id', $id)
            ->setMaxResults(10)
            ->getQuery()
            ->getMaxResults()
        ;
    }

}
