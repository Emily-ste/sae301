<?php

namespace App\Controller;

use App\Repository\ManifestationsRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
