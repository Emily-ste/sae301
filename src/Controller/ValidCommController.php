<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidCommController extends AbstractController
{
    #[Route('/valid-comm', name: 'app_valid_comm')]
    public function index(): Response
    {
        return $this->render('valid_comm/index.html.twig', [
            'controller_name' => 'ValidCommController',
        ]);
    }
}
