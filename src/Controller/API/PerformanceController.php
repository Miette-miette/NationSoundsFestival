<?php

namespace App\Controller\API;

use App\Entity\Performance;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PerformanceController extends AbstractController
{
    #[Route('/api/performance', name: 'api_performance', methods: ['GET'])]
    public function getPartenairesAPI(SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {
        $performance = $entityManager->getRepository(Performance::class)->findAll();
        
        return new JsonResponse(
            $serializer->serialize($performance, 'json'),
            200,
            [],
            true
        );

        return $this->json($data, Response::HTTP_OK);
    }
}
