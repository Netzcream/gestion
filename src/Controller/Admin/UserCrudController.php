<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CodeEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController {
    public static function getEntityFqcn(): string {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable {
        return [
            AvatarField::new('avatar'),
            EmailField::new('email'),
            TextField::new('nombre'),
            TextField::new('apellido'),
            TextField::new('googleId'),
            BooleanField::new('isActive','Activado'),
            BooleanField::new('isVerified','Mail Verificado'),
            ChoiceField::new('roles')->setChoices(['ROLE_USER'=>'ROLE_USER','ROLE_ADMIN'=>'ROLE_ADMIN'])->allowMultipleChoices(),
            //CodeEditorField::new('test'),
        ];
    }
    



}
