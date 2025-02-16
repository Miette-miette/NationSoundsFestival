<?php

namespace App\Controller\API;

use App\Entity\Concert;
use App\Entity\Performance;
use App\Entity\Workshop;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class ProgrammationAPIController extends AbstractController
{
   #[Route('/api/programme', name: 'api_programme', methods: ['GET'])]
    public function api(SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {

        $concerts = $entityManager->getRepository(Concert::class)->findAll();
        $performance = $entityManager->getRepository(Performance::class)->findAll();
        $workshop = $entityManager->getRepository(Workshop::class)->findAll();

        return new JsonResponse(
            $serializer->serialize([$concerts, $performance, $workshop], 'json',["groups" => ['api_event'], AbstractObjectNormalizer::ENABLE_MAX_DEPTH => true] ),
            200,
            [],
            true
        );
        return $this->json($data, Response::HTTP_OK);
    }
}
