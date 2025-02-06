<?php

namespace App\Controller\Pages;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SocialMediaController extends AbstractController
{
    #[Route('/reseaux-sociaux', name: 'app_social_media')]
    public function index(): Response
    {
        return $this->render('pages/social_media.html.twig', [
            'controller_name' => 'HomeController'
        ]);
    }
}