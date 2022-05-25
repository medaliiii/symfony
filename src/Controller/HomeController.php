<?php

namespace App\Controller;

use App\Entity\Articlee;
use App\Form\ArticleeType;
use App\Repository\ArticleeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class HomeController extends AbstractController
{
 
    /**
     * @Route("/Home", name="Home", methods={"GET", "POST"})
     */
    public function new(Request $request, ArticleeRepository $articleeRepository): Response
    {
      

        return $this->render('Home.html.twig');
    }

 
  
}
