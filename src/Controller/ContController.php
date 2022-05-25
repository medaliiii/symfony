<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContController extends AbstractController
{
    /**
     * @Route("/cont", name="app_cont")
     */
    public function index(): Response
    {
        return new Response('<h1>prem page</h1>');
        
    }
}
