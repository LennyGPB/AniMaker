<?php

namespace App\Repository;

use App\Entity\StudioDanimation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudioDanimation>
 *
 * @method StudioDanimation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudioDanimation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudioDanimation[]    findAll()
 * @method StudioDanimation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudioDanimationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudioDanimation::class);
    }

//    /**
//     * @return StudioDanimation[] Returns an array of StudioDanimation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StudioDanimation
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
