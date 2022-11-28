<?php

namespace App\Controller;

use App\Repository\ManifestationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/event/{id}', name: 'app_event')]
    public function index($id, EntityManagerInterface $entityManager, ManifestationsRepository $ManifestationsRepository): Response
    {
        $events = $ManifestationsRepository->find($id);

        return $this->render('event/index.html.twig', [
            'event' => $events,
            'id' => $id,
            'controller_name' => 'EventController',
        ]);
    }
}
