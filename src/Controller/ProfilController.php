<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Form\ClientType;
use App\Repository\ClientsRepository;
use App\Repository\CommandesRepository;
use App\Repository\LignescommandesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(ClientsRepository $clientsRepository, CommandesRepository $commandesRepository, LignescommandesRepository $lignescommandesRepository): Response
    {
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);
        //find commande of current user
        $commandes = $commandesRepository->findCommandesByUser($client);

        //find ligne commande where commande id = commande id
        $ligneCommandes = $lignescommandesRepository->findLigneCommandeByCommande($id);
        return $this->render('profil/index.html.twig', [
            'ligneCommandes' => $ligneCommandes,
            'commandes' => $commandes,
            'client' => $client,
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/edit', name: 'app_client_edit')]
    public function edit(ManagerRegistry $doctrine, ClientsRepository $clientsRepository, Request $request): Response
    {
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);

        //create form with current user data
        $form = $this->createForm(ClientType::class, $client);
        $form->remove('client_adr_rue');
        $form->remove('client_adr_ville');
        $form->remove('client_adr_cp');
        $form = $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/client_edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //edit adresse
    #[Route('/profil/edit/adresse', name: 'app_client_edit_adresse')]
    public function editAdresse(ManagerRegistry $doctrine, ClientsRepository $clientsRepository, Request $request): Response
    {
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);

        //create form with current user data
        $form = $this->createForm(ClientType::class, $client);
        $form->remove('email');
        $form->remove('client_nom');
        $form->remove('client_prenom');
        $form = $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $client = $form->getData();
            $entityManager = $doctrine->getManager();
            $entityManager->persist($client);
            $entityManager->flush();
            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/client_edit_adresse.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    //voir commandes
    #[Route('/profil/commandes', name: 'app_client_commandes')]
    public function commandes(ClientsRepository $clientsRepository): Response
    {
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);

        return $this->render('profil/client_commandes.html.twig', [
            'client' => $client,
        ]);
    }


}
