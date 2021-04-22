<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\General\User;
use App\Entity\Cliente\EstadoCivil;
use App\Entity\Cliente\Pais;
use App\Entity\Cliente\Genero;
use App\Entity\Cliente\TipoDocumento;
use App\Entity\Cliente\EmpresaEstado;
use App\Entity\Cliente\ContactoEstado;

/**
 * @Route("/admin")
 */
class DashboardController extends AbstractDashboardController {
    /**
     * @Route("/", name="admin")
     */
    public function index(): Response {
        return parent::index();

        #https://symfony.com/doc/current/bundles/EasyAdminBundle/dashboards.html
    }

    public function configureDashboard(): Dashboard {

        return Dashboard::new()
        ->setTranslationDomain('admin')
        ->renderContentMaximized()

        //->renderSidebarMinimized()
        ///->disableUrlSignatures()
        //->setTitle('Gestion');

        ->setFaviconPath('build/images/logo-admin.png')
        ->setTitle('<img src="../build/images/logo-admin.png" width="50"> Admin <span class="text-small">Gestión</span>')

        ;
    }

    public function configureMenuItems(): iterable {

        return [

            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
             
            MenuItem::section('Users'),
            

            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
            MenuItem::section('Combos'),
            MenuItem::linkToCrud('Pais', 'fas fa-globe-americas', Pais::class),
            MenuItem::linkToCrud('Genero', 'fas fa-venus-mars', Genero::class),
            MenuItem::linkToCrud('Estado Civil', 'far fa-dot-circle', EstadoCivil::class),
            MenuItem::linkToCrud('Tipo de documento', 'far fa-dot-circle', TipoDocumento::class),
            MenuItem::linkToCrud('Estado de Empresa', 'far fa-dot-circle', EmpresaEstado::class),
            MenuItem::linkToCrud('Estado de Contactos', 'far fa-dot-circle', ContactoEstado::class),
        ];

        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
