<?php

namespace App\Controller;

use App\Entity\Botte;
use App\Form\TroisiemeFormType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class TroisiemeController extends AbstractController {

    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    #[Route('/troisieme', name: 'troisieme', methods: ['GET', 'POST'])]
    public function index(Request $request) {
        $botte = new Botte();
        $form = $this->createForm(TroisiemeFormType::class, $botte);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            setcookie('Mot-à-trouver', "On l'utilise pour bosser dans les champs");
            $botte = $form->getData();
            $this->entityManager->persist($botte);
            $this->entityManager->flush();
            return $this->redirectToRoute('troisieme_show');
        }

        return $this->render('troisieme/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/troisieme/show', name: 'troisieme_show', methods: ['GET'])]
    public function show() {
        $troisiemes = $this->entityManager->getRepository(Botte::class)->findAll();
        return $this->render('troisieme/index.html.twig', [
            'troisiemes' => $troisiemes,
        ]);
    }

}