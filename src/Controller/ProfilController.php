<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Repository\ClientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(ClientsRepository $clientsRepository): Response
    {
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);
        return $this->render('profil/index.html.twig', [
            'client' => $client,
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/edit', name: 'app_client_edit')]
    public function edit(ClientsRepository $clientsRepository): Response
    {
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);
        return $this->render('profil/client_edit.html.twig', [
            'client' => $client,
            'controller_name' => 'ProfilController',
        ]);
    }

    //edit adresse
    #[Route('/profil/edit/adresse', name: 'app_client_edit_adresse')]
    public function editAdresse(ClientsRepository $clientsRepository): Response
    {
        $id = $this->getUser()->getId();
        $client = $clientsRepository->findUserById($id);
        return $this->render('profil/client_edit_adresse.html.twig', [
            'client' => $client,
            'controller_name' => 'ProfilController',
        ]);
    }


}
