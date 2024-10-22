<?php

namespace App\Controller;

use App\Entity\Cube;
use App\Form\SecondFormType;
use App\Repository\CubeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class SeController extends AbstractController
{

    private $cubeRepository;

    public function __construct(CubeRepository $cubeRepository){
        $this->cubeRepository = $cubeRepository;

    }

    #[Route('/second', name: 'second')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cubes = $this->cubeRepository->findAll();
        $cube = null;
        if($cubes != null){
            $cube = $cubes[0];
        }
        $form = $this->createForm(SecondFormType::class, $cube);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newCube = $form->getData();
            if($cube == null){
                $entityManager->persist($newCube);
            }else{
                $cube->setArete($newCube->getArete());
                $entityManager->persist($cube);
            }
            $entityManager->flush();
            return $this->redirectToRoute('second');
        }

        return $this->render('/second/index.html.twig', [
            'entity' => $cube,
            'form' => $form->createView(),
        ]);
    }
}
