<?php

namespace App\Controller\Pages;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProgrammationController extends AbstractController
{
    #[Route('/programmation', name: 'app_programmation')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $event = $entityManager->getRepository(Event::class)->findAll();

        return $this->render('pages/programmation.html.twig', [
            'event' => $event
        ]);
    }
}