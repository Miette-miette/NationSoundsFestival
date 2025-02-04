<?php

namespace App\Controller\API;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ArticleController extends AbstractController
{
    #[Route('/api/articles', name: 'api_news', methods: ['GET'])]
    public function apiAlerte(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {

        $alerte = $entityManager->getRepository(News::class)->findAll();
        return new JsonResponse(
            $serializer->serialize($alerte, 'json'),
            200,
            [],
            true
        );
    }
}
