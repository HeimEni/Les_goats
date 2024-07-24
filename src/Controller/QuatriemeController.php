<?php

namespace App\Controller;

use App\Entity\Croc;
use App\Form\QuatriemeForm;
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
        setcookie('Mot-à-trouver', "On l'utilise pour bosser dans les champs");

        return $this->render('quatrieme/index.html.twig', [
            'crocs' => $crocRepository->findAll(),
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
        $form = $this->createForm(QuatriemeForm::class, $croc);
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
}
