<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidCommController extends AbstractController
{
    #[Route('/valid-comm', name: 'app_valid_comm')]
    public function index(Request $request): Response
    {

        $cookie = $request->cookies->get('panier');
        $cookie = json_decode($cookie, true);

        if (!$this->getUser()) {
            return $this->redirectToRoute('evenements');
        }
        return $this->render('valid_comm/index.html.twig', [
            'cookie' => $cookie,
            'controller_name' => 'ValidCommController',
        ]);
    }
}
