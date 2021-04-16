<?php

namespace App\Controller\Admin;


use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

use App\Entity\ContactoEstado;

class ContactoEstadoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactoEstado::class;
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setEntityLabelInSingular('Estado')
        ->setEntityLabelInPlural('Estados')


        ;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nombre'),
            TextField::new('idCrm'),
            BooleanField::new('vigente','Activado'),
        ];
    }
}
