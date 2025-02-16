<?php

namespace App\Controller\API;

use App\Entity\Concert;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class ConcertAPIController extends AbstractController
{
   #[Route('/api/concert', name: 'api_concert', methods: ['GET'])]
    public function api(SerializerInterface $serializer, EntityManagerInterface $entityManager)
    {

        $concerts = $entityManager->getRepository(Concert::class)->findAll();
        return new JsonResponse(
            $serializer->serialize($concerts, 'json'),
            200,
            [],
            true,
            dd($serializer)
        );
        return $this->json($data,Response::HTTP_OK ,context: ['groups' => ["api_event"]]);
    }  
}
