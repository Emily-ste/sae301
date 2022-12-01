<?php

namespace App\Controller;

use App\Repository\ManifestationsRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(EntityManagerInterface $entityManager, ManifestationsRepository $ManifestationsRepository): Response
    {
        $events = $ManifestationsRepository->findAll();

        return $this->render('panier/index.html.twig', [
            'events' => $events,
            'controller_name' => 'PanierController',
        ]);
    }
}
