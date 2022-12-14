<?php

namespace App\Controller\Admin;

use App\Entity\Clients;
use App\Entity\Manifestations;
use App\Entity\Salles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('Admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sae301');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Manifesations', 'fas fa-list', Manifestations::class);
        yield MenuItem::linkToCrud('Salles', 'fas fa-list', Salles::class);
        yield MenuItem::linkToCrud('Clients', 'fas fa-list', Clients::class);

    }
}
