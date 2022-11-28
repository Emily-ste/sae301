<?php
// src/Controller/TaskController.php
namespace App\Controller;

use App\Entity\Task;
use App\Form\Type\TaskType;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TaskController extends AbstractController{
    #[Route("/recherche", name:"recherche")]
    public function new(ManagerRegistry $doctrine): Response{
        /*$task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();*/




        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        return $this->renderForm('task/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}