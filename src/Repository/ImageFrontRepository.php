<?php

namespace App\Repository;

use App\Entity\ImageFront;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageFront|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageFront|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageFront[]    findAll()
 * @method ImageFront[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageFrontRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageFront::class);
    }

//    /**
//     * @return ImageFront[] Returns an array of ImageFront objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageFront
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
