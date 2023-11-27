<?php

namespace App\Controller\Admin;

use App\Entity\Anime;
use App\Repository\AnimeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class listeAnimeController extends AbstractController
{
    #[Route('/admin/animelist', name: 'admin_liste_anime')]
    public function listeAnime(AnimeRepository $repo): Response
    {
        $lesAnimes = $repo->findAll();
        return $this->render('admin/anime/listeAnime.html.twig', [
            'lesAnimes' => $lesAnimes,
        ]);
    }

}
