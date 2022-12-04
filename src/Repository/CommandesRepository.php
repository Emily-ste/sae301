<?php

namespace App\Repository;

use App\Entity\Commandes;
use App\Entity\Lignescommandes;
use App\Entity\Manifestations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Commandes>
 *
 * @method Commandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commandes[]    findAll()
 * @method Commandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commandes::class);
    }

    public function save(Commandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Commandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findCommandesByUser($id)
    {
        /*$entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            //inner join commande avec lignescommandes
            'SELECT c
            FROM App\Entity\Commandes c
            INNER JOIN App\Entity\Lignescommandes l
            ON l.commandes_id = c.id 
            WHERE c.client_id = :id'
        )->setParameter('id', $id);
        return $query->getResult();*/
        //query builder
        return $this->createQueryBuilder('c')
            ->innerJoin(Lignescommandes::class, 'l', 'WITH l.commandes_id = c.id')
            ->innerJoin(Manifestations::class, 'm', 'WITH m.id = l.manifestation_id')
            ->where('c.client = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Commandes[] Returns an array of Commandes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Commandes
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
