<?php

namespace App\Repository;

use App\Entity\VehicleGeneration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VehicleGeneration|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehicleGeneration|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehicleGeneration[]    findAll()
 * @method VehicleGeneration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehicleGenerationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehicleGeneration::class);
    }

    // /**
    //  * @return VehicleGeneration[] Returns an array of VehicleGeneration objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VehicleGeneration
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
