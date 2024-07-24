<?php

namespace App\Controller;

use App\Entity\Applaudissement;
use App\Form\QuatriemeFormType;

use App\Repository\ApplaudissementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuatriemeController extends AbstractController
{

    #[Route('/quatrieme', name: 'app_quatrieme')]
    public function index(Request $request, EntityManagerInterface $entityManager, ApplaudissementRepository $repository): Response
    {

        $applaudissement = new Applaudissement();

        $applaudissements = $repository->findAll();

        $form = $this->createForm(QuatriemeFormType::class, $applaudissement);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager->persist($applaudissement);
            $entityManager->flush();


            return $this->redirectToRoute('app_quatrieme');
        }


        return $this->render('quatrieme/index.html.twig', [
            'controller_name' => 'QuatriemeController',
            'form' => $form->createView(),
            'applaudissement' => $applaudissements
        ]);
    }
}
