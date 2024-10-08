<?php

namespace App\Repository;

use App\Entity\Burger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Burger>
 */
class BurgerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Burger::class);
    }

    //    /**
    //     * @return Burger[] Returns an array of Burger objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Burger
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findBurgersWithIngredient(string $ingredient)
    {
        $qb = $this->createQueryBuilder('b')
                  ->join('b.oignon', 'o')
                  ->where('o.name = :ingredient')
                  ->setParameter('ingredient', $ingredient);
        return $qb->getQuery()->getResult();
    }

    public function findTopXBurgers(int $limit) : array
    {
        $qb = $this->createQueryBuilder('b')
                  ->orderBy('b.price', 'ASC')
                  ->setMaxResults($limit);
        return $qb->getQuery()->getResult();
    }

}
