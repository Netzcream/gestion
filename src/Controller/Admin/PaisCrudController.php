<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\Pais;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PaisCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return Pais::class;
    }

    
    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nombre'),
            TextField::new('idCrm'),
            TextField::new('iso'),
            TextField::new('nombre_corto'),
            BooleanField::new('vigente','Activado'),
        ];
    }
}
