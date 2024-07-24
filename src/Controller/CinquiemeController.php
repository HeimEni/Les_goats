<?php

namespace App\Controller;

use App\Repository\SarbacaneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CinquiemeController extends AbstractController
{
    #[Route('/cinquieme', name: 'app_cinquieme')]
    public function index(SarbacaneRepository $sarbacaneRepository): Response
    {
        $objects = $sarbacaneRepository->findAll();
        return $this->render('cinquieme/index.html.twig', [
            'controller_name' => 'CinquiemeController', 'objects' => $objects
        ]);
    }
}
