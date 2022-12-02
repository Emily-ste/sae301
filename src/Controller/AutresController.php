<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutresController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('autres/contact.twig', [
            'controller_name' => 'ContactController',
        ]);
    }

    #[Route('/mentions-legales', name: 'app_mentions_legales')]
    public function mentions(): Response
    {
        return $this->render('autres/mentions-legales.twig', [
            'controller_name' => 'MentionsLegalesController',
        ]);
    }

    #[Route('/infos-pratiques', name: 'app_infos_pratiques')]
    public function infos(): Response
    {
        return $this->render('autres/infos-pratiques.twig', [
            'controller_name' => 'InfosPratiquesController',
        ]);
    }
}
