<?php

namespace App\Repository\Cliente;

use App\Entity\Cliente\EmpresaEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmpresaEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmpresaEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmpresaEstado[]    findAll()
 * @method EmpresaEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmpresaEstado::class);
    }

    // /**
    //  * @return EmpresaEstado[] Returns an array of EmpresaEstado objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmpresaEstado
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
