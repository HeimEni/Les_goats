<?php

namespace App\Controller;


use App\Repository\CrocRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class QuatriemeController extends AbstractController
{
    #[Route('/', name: 'app_quatrieme_index', methods: ['GET'])]
    public function index(CrocRepository $crocRepository): Response
    {
        setcookie('Entity4', "Un croc");

        return $this->render('quatrieme/index.html.twig', [
            'crocs' => $crocRepository->findAll(),
        ]);
    }

}
