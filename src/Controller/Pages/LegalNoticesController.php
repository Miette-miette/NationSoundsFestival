<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LegalNoticesController extends AbstractController
{
    #[Route('/mentions-legales', name: 'app_legal_notice')]
    public function index(): Response
    {
        return $this->render('pages/mentions-legales.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }
}