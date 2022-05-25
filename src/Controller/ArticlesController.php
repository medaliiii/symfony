<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Articlee;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="app_articles")
     */
    public function index()
    {
        
        $articles=['article1','article2','article3'];
        return $this-> render('articles/index.html.twig',['articles'=>$articles]);
    }
/**
     * @Route("/articles/save")
     */

    public function save()
    {
        $entityManager = $this -> getDoctrine()->getManager();
        $Articlee = new Articlee();
        $Articlee ->setNom('Article1');
        $Articlee ->setPrix(1000);

        $entityManager -> persist($Articlee);
        $entityManager -> flush();

        return new Response('Article enregistré avec id '. $Articlee->getId());

    }
}
