<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LivreRepository;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(LivreRepository $livreRepo)
    {
        $liste_livres = $livreRepo->findAll();
        return $this->render('accueil/index.html.twig',compact("liste_livres")); 
    }

    /**
     * @Route("/auteur/{auteur}", name="recherche_auteur")
     */
    public function rech(LivreRepository $livreRepo, $auteur)
    {
        $liste_livres = $livreRepo->findByAuteur($auteur);
        return $this->render('accueil/index.html.twig',compact("liste_livres")); 
    }

}
 