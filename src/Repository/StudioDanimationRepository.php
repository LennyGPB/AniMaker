<?php

namespace App\Repository;

use App\Entity\StudioDanimation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
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

   /**
    * @return StudioDanimation[] Returns an array of StudioDanimation objects
    */
   public function listeStudioAnimationComplete(): ?Query
   {
       return $this->createQueryBuilder('s')
            ->select('s')
            ->orderBy('s.nomStudio', 'ASC')
            ->getQuery()
       ;
   }

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
