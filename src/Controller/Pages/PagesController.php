<?php

namespace App\Controller\Pages;

use App\Entity\Event;
use App\Entity\Map;
use App\Entity\News;
use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PagesController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $concert = $entityManager->getRepository(Event::class)->findAll();
        $new = $entityManager->getRepository(News::class)->findAll();

        return $this->render('pages/home.html.twig', [
            'concert' => $concert,
            'new' => $new
        ]);
    }

    #[Route('/concert', name: 'app_concert')]
    public function concert(EntityManagerInterface $entityManager): Response
    {
        $concert = $entityManager->getRepository(Event::class)->findAll();

        return $this->render('Pages/concert.html.twig', [
            'concerts' => $concert
        ]);
    }

    #[Route('/programmation', name: 'app_programmation')]
    public function event(EntityManagerInterface $entityManager): Response
    {
        $event = $entityManager->getRepository(Event::class)->findAll();

        return $this->render('pages/programmation.html.twig', [
            'event' => $event
        ]);
    }

    #[Route('/partenaires', name: 'app_partners')]
    public function partner(EntityManagerInterface $entityManager): Response
    {
        return $this->render('Pages/partners.html.twig', [
            'partner' => $entityManager->getRepository(Partner::class)->findAll()
        ]);
    }

    #[Route('/reseaux-sociaux', name: 'app_social_media')]
    public function social_media(): Response
    {
        return $this->render('pages/social_media.html.twig');
    }

    #[Route('/carte', name: 'app_map')]
    public function map(EntityManagerInterface $entityManager): Response
    {
        $map = $entityManager->getRepository(Map::class)->findAll();

        return $this->render('pages/map.html.twig', [
            'map' => $map
        ]);
    }

    #[Route('/FAQ', name: 'app_faq')]
    public function faq(): Response
    {
        return $this->render('pages/FAQ.html.twig');
    }

    #[Route('/mentions-legales', name: 'app_legal_notice')]
    public function legal_notice(): Response
    {
        return $this->render('pages/mentions-legales.html.twig');
    }

    #[Route('/politique_confidentialite', name: 'app_privacy_policy')]
    public function privacy_policy(): Response
    {
        return $this->render('pages/privacy-policy.html.twig');
    }
}