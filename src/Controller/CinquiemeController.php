<?php

namespace App\Controller;

use App\Entity\Sarbacane;
use App\Form\CinquiemeForm;
use App\Repository\SarbacaneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CinquiemeController extends AbstractController
{
    #[Route('cinquieme/form', name: 'app_form')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sarbacane = new Sarbacane();
        $sarbacaneForm = $this->createForm(CinquiemeForm::class, $sarbacane);

        $sarbacaneForm->handleRequest($request);

        if ($sarbacaneForm->isSubmitted() && $sarbacaneForm->isValid()) {

            $projectileTypes = ['flèche', 'boulette', 'bille'];

            $randomType = $projectileTypes[array_rand($projectileTypes)];

            $sarbacane->setProjectileType($randomType);
            $entityManager->persist($sarbacane);
            $entityManager->flush();
            return $this->redirectToRoute('app_cinquieme');
        }
        return $this->render('form/index.html.twig', [
            'sarbacaneForm' => $sarbacaneForm->createView(),
        ]);
    }

    #[Route('/cinquieme', name: 'app_cinquieme')]
    public function index2(SarbacaneRepository $sarbacaneRepository): Response
    {
        $objects = $sarbacaneRepository->findAll();
        return $this->render('cinquieme/index.html.twig', [
            'objects' => $objects
        ]);
    }
}
