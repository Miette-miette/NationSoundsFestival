<?php

namespace App\Controller\Pages;

use App\Entity\Map;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MapController extends AbstractController
{
    #[Route('/carte', name: 'app_map')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $map = $entityManager->getRepository(Map::class)->findAll();
      

        return $this->render('pages/map.html.twig', [
            'controller_name' => 'HomeController',
            'map' => $map
        ]);
    }
}