<?php

namespace App\Controller\Pages;

use App\Entity\Event;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
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
}
