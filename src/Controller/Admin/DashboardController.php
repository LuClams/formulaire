<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use App\Entity\Booking;
use App\Entity\Contact;
use App\Entity\Hostel;
use App\Entity\Manager;
use App\Entity\Room;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    //#[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(HostelCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Formulaire');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         //yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        //return [
            yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
            yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

            yield MenuItem::section('Admin');
            yield MenuItem::linkToCrud('Administrators', 'fa fa-tags', Administrator::class);

            yield MenuItem::section('Managemement');
            yield MenuItem::linkToCrud('Managers', 'fa fa-file-text', Manager::class);
            yield MenuItem::linkToCrud('Contact Form', 'fa fa-user', Contact::class);

            yield MenuItem::section('Users');
            yield MenuItem::linkToCrud('Users', 'fa fa-comment', User::class);

            yield MenuItem::section('Hostel Group');
            yield MenuItem::linkToCrud('Hostels', 'fa fa-comment', Hostel::class);
            yield MenuItem::linkToCrud('Rooms', 'fa fa-comment', Room::class);

        //];
    }
}
