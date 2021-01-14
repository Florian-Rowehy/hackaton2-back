<?php

namespace App\Repository;

use App\Entity\Tile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tile|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tile|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tile[]    findAll()
 * @method Tile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tile::class);
    }

    public function isMovableTile(int $x, int $y): bool
    {
        return ((bool) $this->createQueryBuilder('t')
            ->andWhere('t.coordX = :x')
            ->setParameter('x', $x)
            ->andWhere('t.coordY = :y')
            ->setParameter('y', $y)
            ->andWhere('t.room IS NOT NULL')
            ->getQuery()
            ->getResult())
            ;
    }

    // /**
    //  * @return Tile[] Returns an array of Tile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tile
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
