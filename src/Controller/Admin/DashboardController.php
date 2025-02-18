<?php

namespace App\Controller\Admin;

use App\Entity\Alert;
use App\Entity\Concert;
use App\Entity\Contact;
use App\Entity\Event;
use App\Entity\Location;
use App\Entity\Map;
use App\Entity\News;
use App\Entity\Partner;
use App\Entity\Performance;
use App\Entity\User;
use App\Entity\Workshop;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_EDITOR')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin_index')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/images/icons/logo.png" class="img-fluid d-block mx-auto" style="max-width:100px; width:100%;"><h3>Nation Sounds- Administration</h3>')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');

        yield MenuItem::section('Programmation du festival');

        yield MenuItem::linkToCrud('Evènements', 'fa-solid fa-music', Event::class);

        yield MenuItem::section('Carte');

        yield MenuItem::linkToCrud('Carte', 'fa-solid fa-map', Map::class);
        yield MenuItem::linkToCrud('Lieux', 'fa-solid fa-location-dot', Location::class);

        yield MenuItem::section("Actualités et alertes");

        yield MenuItem::linkToCrud('Actualités', 'fa-solid fa-newspaper', News::class);
        yield MenuItem::linkToCrud('Alertes', 'fa-solid fa-triangle-exclamation', Alert::class);
        yield MenuItem::linkToCrud('Partenaires', 'fa-solid fa-handshake', Partner::class);

        yield MenuItem::section('Utilisateurs');

        yield MenuItem::linkToCrud('Utilisateurs', 'fa-solid fa-user', User::class);
        yield MenuItem::linkToCrud('Demandes de contact', 'fa-solid fa-envelope', Contact::class);




    }
}