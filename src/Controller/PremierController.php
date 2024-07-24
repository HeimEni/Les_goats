<?php

namespace App\Controller;

use App\Entity\Applaudissement;
use App\Form\PremierFormType;

use App\Repository\ApplaudissementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PremierController extends AbstractController
{

    #[Route('/premier', name: 'app_premier')]
    public function index(Request $request, EntityManagerInterface $entityManager, ApplaudissementRepository $repository): Response
    {

        $applaudissement = new Applaudissement();

        $applaudissements = $repository->findAll();

        $form = $this->createForm(PremierFormType::class, $applaudissement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->persist($applaudissement);
            $entityManager->flush();

            return $this->redirectToRoute('app_premier');
        }


        return $this->render('premier/index.html.twig', [
            'controller_name' => 'PremierController',
            'form' => $form->createView(),
            'applaudissement' => $applaudissements
        ]);
    }
}
