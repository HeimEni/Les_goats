<?php

namespace App\Controller;

use App\Entity\Sarbacane;
use App\Form\SarbacaneType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sarbacane = new Sarbacane();
        $sarbacaneForm = $this->createForm(SarbacaneType::class, $sarbacane);

        $sarbacaneForm->handleRequest($request);

        if ($sarbacaneForm->isSubmitted() && $sarbacaneForm->isValid()) {

            $projectileTypes = ['flèche', 'boulette', 'bille'];

            $randomType = $projectileTypes[array_rand($projectileTypes)];

            $sarbacane->setProjectileType($randomType);
            $entityManager->persist($sarbacane);
            $entityManager->flush();
            return $this->redirectToRoute('main/home.html.twig');
        }
        return $this->render('form/index.html.twig', [
            'sarbacaneForm' => $sarbacaneForm->createView(),
        ]);
    }
}
