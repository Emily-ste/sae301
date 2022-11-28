<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Recherche;
use App\Form\Type\RechercheType;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RechercheController extends AbstractController{
    #[Route("/recherche", name:"recherche")]
    public function new(ManagerRegistry $doctrine): Response{
        $recherche = new Recherche();
        $form = $this->createForm(RechercheType::class, $recherche);

        return $this->render('form/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}