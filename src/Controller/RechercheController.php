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
    public function new(Request $request): Response{
        $recherche = new Recherche();
        $form = $this->createForm(RechercheType::class, $recherche);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $recherche = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('resultat');
        }

        return $this->render('form/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}