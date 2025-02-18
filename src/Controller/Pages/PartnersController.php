<?php

namespace App\Controller\Pages;

use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PartnersController extends AbstractController
{
    #[Route('/partenaires', name: 'app_partners')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('Pages/partners.html.twig', [
            'partner' => $entityManager->getRepository(Partner::class)->findAll()
        ]);
    }
}