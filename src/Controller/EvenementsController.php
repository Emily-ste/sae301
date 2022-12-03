<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ManifestationsRepository;
use Doctrine\ORM\EntityManagerInterface;




class EvenementsController extends AbstractController
{
    #[Route("/evenements", name:"evenements")]
    public function events(EntityManagerInterface $entityManager, ManifestationsRepository $ManifestationsRepository)
    {
        $events = $ManifestationsRepository->findAll();

        return $this->render('evenements/index.html.twig', [
            'events' => $events
        ]);
    }

    #[Route("/evenements/{name}", name:"evenements_name")]
    public function eventsName($name, EntityManagerInterface $entityManager, ManifestationsRepository $ManifestationsRepository)
    {
        //if name empty render all events
        if ($name === 'all') {
            $events = $ManifestationsRepository->findAll();
        } else {
            $events = $ManifestationsRepository->FindManifestationsByName($name);
        }

        return new JsonResponse($this->renderView('evenements/_reponse.html.twig', [
            'events' => $events
        ]));
    }
}
