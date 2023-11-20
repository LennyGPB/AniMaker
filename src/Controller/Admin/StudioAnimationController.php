<?php

namespace App\Controller\Admin;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\StudioDanimationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudioAnimationController extends AbstractController
{
    #[Route('/admin/studio_animation', name: 'admin_studioAnimation', methods:'GET')]
    public function ListeStudioAnimation(StudioDanimationRepository $repo, PaginatorInterface $paginator, Request $request): Response
    {
        $listeStudioAnimation = $paginator->paginate(
            $repo->listeStudioAnimationComplete(), /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );
       
        return $this->render('admin/studioAnimation/listeStudio.html.twig', [
            'listeStudioAnimation' => $listeStudioAnimation,
        ]);
    }
}
