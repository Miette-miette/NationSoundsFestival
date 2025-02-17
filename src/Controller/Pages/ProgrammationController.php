<?php

namespace App\Controller\Pages;

use App\Entity\Concert;
use App\Entity\Performance;
use App\Entity\Workshop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProgrammationController extends AbstractController
{
    #[Route('/programmation', name: 'app_programmation')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $concert = $entityManager->getRepository(Concert::class)->findAll();
        $performances = $entityManager->getRepository(Performance::class)->findAll();
        $workshop = $entityManager->getRepository(Workshop::class)->findAll();

        return $this->render('pages/programmation.html.twig', [
            'controller_name' => 'HomeController',
            'concert' => $concert,
            'performances' => $performances,
            'workshop' => $workshop
        ]);
    }
}