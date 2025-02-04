<?php

namespace App\Controller\API;

use App\Entity\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PartnerController extends AbstractController
{
    #[Route('/api/partenaires', name: 'api_partner', methods: ['GET'])]
    public function getPartenairesAPI(SerializerInterface $serializer, EntityManagerInterface $entityManager): Response
    {
        

        $partenaire = $entityManager->getRepository(Partner::class)->findAll();
        
        return new JsonResponse(
            $serializer->serialize($partenaire, 'json'),
            200,
            [],
            true
        );

        return $this->json($data, Response::HTTP_OK);
    } 
}
