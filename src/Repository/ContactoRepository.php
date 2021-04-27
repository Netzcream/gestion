<?php

namespace App\Repository;

use App\Entity\Contacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contacto[]    findAll()
 * @method Contacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contacto::class);
    }

     /**
      * @return Contacto[] Returns an array of Contacto objects
      */

     public function buscar($buscar,$order = ['id','ASC'],$max = 100 )
     {
        $texto = (array_key_exists('texto',$buscar) ? $buscar['texto'] : null);


        $builder = $this->createQueryBuilder('c');
        if ($texto) {
            $builder->orWhere('c.nombre like :texto');

            $builder->orWhere('c.apellido like :texto');
            $builder->setParameter('texto', '%'.$texto.'%');
        }
        $builder->orderBy('c.'.$order[0], $order[1]);
        $builder->setMaxResults($max);
        
        

        return $builder->getQuery()->getResult();
    }

     /**
      * @return Contacto[] Returns an array of Contacto objects
      */
     public function todos() {
        $builder = $this->createQueryBuilder('c');
        $builder->orderBy('c.id','ASC');
        return $builder->getQuery()->getResult();
    }



    /*
    public function findOneBySomeField($value): ?Contacto
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
