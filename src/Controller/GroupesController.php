<?php

namespace App\Controller;

use App\Entity\Groupes;
use App\Form\GroupesType;
use App\Repository\GroupesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/groupes')]
class GroupesController extends AbstractController
{
    #[Route('/', name: 'groupes_index', methods: ['GET'])]
    public function index(GroupesRepository $groupesRepository): Response
    {
        return $this->render('groupes/index.html.twig', [
            'groupes' => $groupesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'groupes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $groupe = new Groupes();
        $form = $this->createForm(GroupesType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($groupe);
            $entityManager->flush();

            return $this->redirectToRoute('groupes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('groupes/new.html.twig', [
            'groupe' => $groupe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'groupes_show', methods: ['GET'])]
    public function show(Groupes $groupe): Response
    {
        return $this->render('groupes/show.html.twig', [
            'groupe' => $groupe,
        ]);
    }

    #[Route('/{id}/edit', name: 'groupes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Groupes $groupe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GroupesType::class, $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('groupes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('groupes/edit.html.twig', [
            'groupe' => $groupe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'groupes_delete', methods: ['POST'])]
    public function delete(Request $request, Groupes $groupe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$groupe->getId(), $request->request->get('_token'))) {
            $entityManager->remove($groupe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('groupes_index', [], Response::HTTP_SEE_OTHER);
    }
}
