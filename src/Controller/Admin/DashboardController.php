<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;

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
            //MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];

        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
