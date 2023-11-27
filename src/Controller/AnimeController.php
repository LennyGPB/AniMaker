<?php

namespace App\Controller;

use App\Entity\Anime;
use App\Repository\AnimeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimeController extends AbstractController
{
    #[Route('/anime', name: 'listeAnime', methods:["GET"])]
    public function listeAnime(AnimeRepository $repo): Response
    {
        $lesAnimes = $repo->findAll();
        return $this->render('anime/anime.html.twig', [
            'lesAnimes' => $lesAnimes,
        ]);
    }

    #[Route('/anime/{id}', name: 'ficheAanime', methods:["GET"])]
    public function ficheAnime(Anime $anime): Response
    {
        return $this->render('anime/anime.html.twig', [
            'leAnime' => $anime,
        ]);
    }
}
