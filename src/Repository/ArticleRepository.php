<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Article[] Returns an array of Article objects
     */
    
    public function findByPublie($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.publie = :val')
            ->setParameter('val', $value)
            ->orderBy('a.date_parution', 'DESC')
            ->getQuery()
            ->getResult()
            // ->setMaxResults(100)
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByDate()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.date_parution', 'DESC')
            ->getQuery()
            ->getResult()
            // ->setMaxResults(100)
        ;
    }
    
}
