<?php

namespace App\Controller\API;

use App\Entity\Workshop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class WorkshopController extends AbstractController
{
    #[Route('/api/ateliers', name: 'api_workshop', methods: ['GET'])]
    public function api(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {

        $atelier = $entityManager->getRepository(Workshop::class)->findAll();
        return new JsonResponse(
            $serializer->serialize($atelier, 'json'),
            200,
            [],
            true
        );
        return $this->json($data, Response::HTTP_OK);
    }  
}
