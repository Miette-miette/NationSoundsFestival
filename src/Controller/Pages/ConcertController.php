<?php

namespace App\Controller\Pages;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConcertController extends AbstractController
{
    #[Route('/concert', name: 'app_concert')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $concert = $entityManager->getRepository(Event::class)->findAll();

        return $this->render('Pages/concert.html.twig', [
            'concerts' => $concert
        ]);
    }
}
