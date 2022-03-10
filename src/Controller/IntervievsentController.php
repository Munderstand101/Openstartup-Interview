<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Repository\EntrepriseRepository;
use App\Repository\InterviewRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IntervievsentController extends AbstractController
{
    #[Route('/Startups', name: 'intervievsent')]
    public function index(EntrepriseRepository $entrepriseRepository, InterviewRepository $interviewRepository): Response
    {

        return $this->render('intervievsent/index.html.twig', [
            'controller_name' => 'IntervievsentController',
            'entreprises' => $entrepriseRepository->findAll(),
            'interviews' => $interviewRepository->findAll(),
        ]);
    }
}
