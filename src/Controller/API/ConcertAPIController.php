<?php

namespace App\Controller\API;

use App\Entity\Concert;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ConcertAPIController extends AbstractController
{
   #[Route('/api/concert', name: 'api_concert', methods: ['GET'])]
    public function api(SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {

        $concerts = $entityManager->getRepository(Concert::class)->findAll();
        return new JsonResponse(
            $serializer->serialize($concerts, 'json',["groups" => ['api_event'], AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true] ),
            200,
            [],
            true
        );
        return $this->json($data, Response::HTTP_OK);
    }
}
