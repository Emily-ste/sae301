<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Form\ContactType;
use App\Repository\ClientsRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutresController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(ManagerRegistry $doctrine, ClientsRepository $clientsRepository, Request $request): Response
    {

        //create form with current user data
        $form = $this->createForm(ContactType::class);
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //get data
            $contact = $form->getData();
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('autres/contact.twig', [
            'form' => $form->createView(),
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
