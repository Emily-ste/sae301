<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
