<?php

namespace App\Controller\Admin;

use App\Entity\Marque;
use App\Entity\Product;
use App\Controller\Admin\MarqueCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(MarqueCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Project Name')
            ->setLocales([
                'en'=>'GB English',
                'fr'=>'FR French'
            ]);
    }

    public function configureMenuItems(): iterable
    {
        
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        
        // links to the 'index' action of the Category CRUD controller
        yield MenuItem::linkToCrud('Marques', 'fa fa-tags', Marque::class);

        // links to the 'index' action of the Category CRUD controller
        yield MenuItem::linkToCrud('Produits', 'fa fa-tags', Product::class);

    }
}
