<?php

namespace App\Repository;

use App\Entity\Commandes;
use App\Entity\Lignescommandes;
use App\Entity\Manifestations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lignescommandes>
 *
 * @method Lignescommandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lignescommandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lignescommandes[]    findAll()
 * @method Lignescommandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignescommandesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lignescommandes::class);
    }

    public function save(Lignescommandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Lignescommandes $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //findLignesCommandesByCommande
    public function findLignesCommandesByCommande($commandeId)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.commandes = :commande')
            ->setParameter('commande', $commandeId)
            ->orderBy('l.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Lignescommandes[] Returns an array of Lignescommandes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lignescommandes
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
