<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request): Response
    {
        //get cookie
        $cookie = $request->cookies->get('panier');

        $user = $this->getUser();


        //delete session cookie
        return $this->render('commande/index.html.twig', [
            'cookie' => $cookie,
            'controller_name' => 'CommandeController',
        ]);
    }
}
