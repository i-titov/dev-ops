<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AgendaRepository;
use App\Entity\Agenda;

class AgendaController extends AbstractController
{
    #[Route('/agenda', name: 'app_agenda')]
    public function index(Request $request,AgendaRepository $agendaRepository,EntityManagerInterface $entityManager,): Response
    {
        $agenda = new Agenda();

        $data = $agendaRepository->findAll();
        $result = [];
        foreach ($data as $value){
            $res = [
                'id' => $value->getId(),
                'title' => $value->getTitle(),
                'start' => $value->getStart()
                ];
            $result[] = $res;
        }

        $form = $this->createFormBuilder($agenda)
            ->add('title', TextType::class)
            ->add('start', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Add event'])
            ->setMethod('POST')
            ->getForm();

        return $this->render('agenda/index.html.twig', [
            'controller_name' => 'AgendaController',
            'data' => json_encode($result),
            'form' => $form->createView()
        ]);
    }
}
