<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Entity\TipoDocumento;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoDocumentoCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return TipoDocumento::class;
    }

    
    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('nombre'),
            TextField::new('idCrm'),
            BooleanField::new('vigente','Activado'),
        ];
    }
}
