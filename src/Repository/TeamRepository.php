<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\ORM\Query;
use App\Entity\SearchTeam;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Team::class);
    }




    public function findAllTeam(SearchTeam $searchTeam) : Query{
        $query = $this->createQueryBuilder('t');

        if($searchTeam->getNameOfTeam()) {// est-ce que ma recherche n'est pas vide
            $query = $query
                ->andWhere('t.name = :name')
                ->setParameter(':name', $searchTeam->getNameOfTeam());            
        }
       
        return $query->getQuery();
    }




    
//       public function findAllYearthOfBirth()
    // {
    //     return $this->createQueryBuilder('p')
    //     ->where('p.yearOfBirth >=2010')
    //     ->orderBy('p.yearOfBirth', 'DESC')
    //     ->getQuery()
    //     ->getResult();
        
    


    // /**
    //  * @return Team[] Returns an array of Team objects
    //  */
    
    // public function findByTeamName($name)
    // {
    //     return $this->createQueryBuilder('t')
    //         ->andWhere('t.name = :val')
    //         ->setParameter('val', $name)
    //         ->orderBy('t.id', 'ASC')
    //         // ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
    

    /*
    public function findOneBySomeField($value): ?Team
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
