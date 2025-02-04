<?php

namespace App\Controller\API;

use App\Entity\Alert;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AlertController extends AbstractController
{
    #[Route('/api/alerts', name: 'api_alerts', methods: ['GET'])]
    public function apiAlerte(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {

        $alerte = $entityManager->getRepository(Alert::class)->findAll();
        return new JsonResponse(
            $serializer->serialize($alerte, 'json'),
            200,
            [],
            true
        );
    }
}
