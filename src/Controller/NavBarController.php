<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NavBarController extends AbstractController
{
    public function searchBar()
    {
        return $this->render('nav_bar/index.html.twig', [
            'test' => 'test'
        ]);
    }
}
