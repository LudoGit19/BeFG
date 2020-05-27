<?php

namespace App\Repository;

use App\Entity\Player;
use Doctrine\ORM\Query;
use App\Entity\SearchPlayer;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Player|null find($id, $lockMode = null, $lockVersion = null)
 * @method Player|null findOneBy(array $criteria, array $orderBy = null)
 * @method Player[]    findAll()
 * @method Player[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    public function findAllPagination(SearchPlayer $searchPlayer) : Query{
        $req = $this->createQueryBuilder('p');
        if($searchPlayer->getMinYearOfBirth()) {// est-ce que ma recherche n'est pas vide
            $req = $req->andWhere('p.yearOfBirth >= :min')
            ->orderBy('p.id', 'ASC')
            ->setParameter(':min', $searchPlayer->getMinYearOfBirth());            
        }
        if($searchPlayer->getMaxYearOfBirth()) {
            $req = $req->andWhere('p.yearOfBirth <= :max')
            ->setParameter(':max', $searchPlayer->getMaxYearOfBirth());
        } 

        return $req->getQuery();
    }

    // public function findAllYearth()
    // {
    //     return $this->createQueryBuilder('p')
    //     ->where('p.yearOfBirth = 2019 ')
    //     ->getQuery()
    //     ->getResult();

    // }

    //       public function findAllYearthOfBirth()
    // {
    //     return $this->createQueryBuilder('p')
    //     ->where('p.yearOfBirth >=2010')
    //     ->orderBy('p.yearOfBirth', 'DESC')
    //     ->getQuery()
    //     ->getResult();
        

    // }

    // // Jointure 
    // public function getHistory($users) {
    //     $qb = $this->entityManager->createQueryBuilder();
    //     $qb
    //         ->select('a', 'u')
    //         ->from('Credit\Entity\UserCreditHistory', 'a')
    //         ->leftJoin('a.user', 'u')
    //         ->where('u = :user')
    //         ->setParameter('user', $users)
    //         ->orderBy('a.created_at', 'DESC');
    
    //     return $qb->getQuery()->getResult();
    // }


}

    // public function findAllGreaterThanPrice($price): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
    //         'SELECT p
    //         FROM App\Entity\Product p
    //         WHERE p.price > :price
    //         ORDER BY p.price ASC'
    //     )->setParameter('price', $price);

    //     // returns an array of Product objects
    //     return $query->getResult();
    // }



    // /**
    //  * @return Player[] Returns an array of Player objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Player
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

