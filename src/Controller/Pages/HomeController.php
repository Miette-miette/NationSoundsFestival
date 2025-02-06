<?php

namespace App\Controller\Pages;

use App\Entity\Concert;
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
        $concert = $entityManager->getRepository(Concert::class)->findAll();
        $new = $entityManager->getRepository(News::class)->findAll();

        return $this->render('pages/home.html.twig', [
            'controller_name' => 'HomeController',
            'concert' => $concert,
            'new' => $new
        ]);
    }
}
