<?php

namespace App\Controller;

use App\Entity\Croc;
use App\Form\CrocType;
use App\Repository\CrocRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/quatrieme')]
class QuatriemeController extends AbstractController
{
    #[Route('/', name: 'app_quatrieme_index', methods: ['GET'])]
    public function index(CrocRepository $crocRepository): Response
    {
        return $this->render('quatrieme/index.html.twig', [
            'crocs' => $crocRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_quatrieme_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $croc = new Croc();
        $form = $this->createForm(CrocType::class, $croc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($croc);
            $entityManager->flush();

            return $this->redirectToRoute('app_quatrieme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quatrieme/new.html.twig', [
            'croc' => $croc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quatrieme_show', methods: ['GET'])]
    public function show(Croc $croc): Response
    {
        return $this->render('quatrieme/show.html.twig', [
            'croc' => $croc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_quatrieme_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Croc $croc, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CrocType::class, $croc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_quatrieme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('quatrieme/edit.html.twig', [
            'croc' => $croc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_quatrieme_delete', methods: ['POST'])]
    public function delete(Request $request, Croc $croc, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$croc->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($croc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_quatrieme_index', [], Response::HTTP_SEE_OTHER);
    }
}
