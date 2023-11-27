<?php

namespace App\Controller\Admin;

use App\Entity\Anime;
use App\Form\AnimeType;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimeController extends AbstractController
{
    #[Route('/admin/anime/ajout', name: 'admin_anime_ajout', methods:["GET", "POST"])]
    #[Route('/admin/anime/modif/{id}', name: 'admin_anime_modif', methods:["GET", "POST"])]
    public function ajoutModifanime(Anime $anime = null, Request $request, EntityManagerInterface $manager): Response
    {      
        // Créer un objet dans le cadre d'un ajout :
        if($anime == null)
        {
            $anime = new Anime();
            $mode = "ajouté";
        }
        else 
        {
            $mode = "modifié";
        }

        $form = $this->createForm(animeType::class, $anime);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($anime);
            $manager->flush();
            $this->addFlash("success","L'anime à bien été $mode");
            return $this->redirectToRoute('admin_liste_anime');
        }
        return $this->render('admin/anime/formAjout.html.twig', [
            'formAnime' => $form->createView(),
        ]);
    }

    #[Route('/admin/anime/supp/{id}', name: 'admin_anime_supp', methods:["GET"])]
    public function suppAnime(Anime $anime, EntityManagerInterface $manager): Response
    {      
         $manager->remove($anime);
         $manager->flush();
         $this->addFlash("success","L'anime à bien été supprimé");          
         return $this->redirectToRoute('admin_liste_anime');
    }
}
