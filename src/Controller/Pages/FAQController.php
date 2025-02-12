<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FAQController extends AbstractController
{
    #[Route('/FAQ', name: 'app_faq')]
    public function index(): Response
    {
        return $this->render('pages/FAQ.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }
}