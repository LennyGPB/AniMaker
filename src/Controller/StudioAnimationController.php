<?php

namespace App\Controller;

use App\Repository\StudioDanimationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudioAnimationController extends AbstractController
{
    #[Route('/studio_animation', name: 'studioAnimation', methods:'GET')]
    public function ListeStudioAnimation(StudioDanimationRepository $repo): Response
    {
        $listeStudioAnimation=$repo->findAll();
        return $this->render('studioAnimation/listeStudio.html.twig', [
            'listeStudioAnimation' => $listeStudioAnimation,
        ]);
    }
}
