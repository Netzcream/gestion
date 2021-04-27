<?php

namespace App\Repository\Cliente;

use App\Entity\Cliente\Empresa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Empresa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Empresa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Empresa[]    findAll()
 * @method Empresa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmpresaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Empresa::class);
    }

    /**
     * @return Empresa[] Returns an array of Empresa objects
     */
     public function buscar($buscar,$order = ['id','ASC'],$max = 100 )
     {
        $texto = (array_key_exists('texto',$buscar) ? $buscar['texto'] : null);


        $builder = $this->createQueryBuilder('c');
        if ($texto) {
            $builder->orWhere('c.razon_social like :texto');
            $builder->orWhere('c.nombre_fantasia like :texto');
            $builder->setParameter('texto', '%'.$texto.'%');
        }
        $builder->orderBy('c.'.$order[0], $order[1]);
        $builder->setMaxResults($max);
        
        

        return $builder->getQuery()->getResult();
    }

     /**
      * @return Empresa[] Returns an array of Empresa objects
      */
     public function todos() {
        $builder = $this->createQueryBuilder('c');
        $builder->orderBy('c.id','ASC');
        return $builder->getQuery()->getResult();
    }

    /*
    public function findOneBySomeField($value): ?Empresa
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
