<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\Lignescommandes;
use App\Entity\Clients;
use App\Entity\Manifestations;
use App\Repository\CommandesRepository;
use App\Repository\LignescommandesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, ManagerRegistry $doctrine, CommandesRepository $commandesRepository, LignescommandesRepository $lignescommandesRepository): Response
    {
        //get cookie
        $cookie = $request->cookies->get('panier');
        $cookie = json_decode($cookie, true);

        if ($cookie == null) {
            return $this->redirectToRoute('evenements');
        }

        //SAVE COMMANDE
        //get id of current user
        $id = $this->getUser()->getId();
        $client = $doctrine->getRepository(Clients::class)->find($id);

        //get date
        $date = new \DateTime();
        $date = $date->format('Y-m-d H:i:s');

        //save id client et date in commande entity
        $commande = new Commandes();
        $commande->setClient($client);
        $commande->setCommandeDate($date);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($commande);
        $entityManager->flush();


        //SAVE LIGNES COMMANDE
        //for each manifestation in cookie
        foreach ($cookie as $value) {
            //get from cookie
            $idManif = $value['id'];
            $nbResa = $value['quantite'];

            //get manifestation
            $idManif = $doctrine->getRepository(Manifestations::class)->find($idManif);

            //get id of commande
            $idCommande = $commande->getId();
            $commande = $doctrine->getRepository(Commandes::class)->find($idCommande);

            //save in lignescommandes entity
            $lignescommandes = new Lignescommandes();
            $lignescommandes->setNbPlaceResa($nbResa);
            $lignescommandes->setManifestation($idManif);
            $lignescommandes->setCommandes($commande);
            $entityManager = $doctrine->getManager();
            $entityManager->persist($lignescommandes);
            $entityManager->flush();
        }

        return $this->render('commande/index.html.twig', [
            'cookie' => $cookie,
            'controller_name' => 'CommandeController',
        ]);
    }
}
