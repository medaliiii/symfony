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
 * @Route("/art")
 */
class ArtController extends AbstractController
{
    /**
     * @Route("/", name="app_art_index", methods={"GET"})
     */
    public function index(ArticleeRepository $articleeRepository): Response
    {
        return $this->render('art/index.html.twig', [
            'articlees' => $articleeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_art_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ArticleeRepository $articleeRepository): Response
    {
        $articlee = new Articlee();
        $form = $this->createForm(ArticleeType::class, $articlee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleeRepository->add($articlee);
            return $this->redirectToRoute('app_art_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('art/new.html.twig', [
            'articlee' => $articlee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_art_show", methods={"GET"})
     */
    public function show(Articlee $articlee): Response
    {
        return $this->render('art/show.html.twig', [
            'articlee' => $articlee,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_art_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Articlee $articlee, ArticleeRepository $articleeRepository): Response
    {
        $form = $this->createForm(ArticleeType::class, $articlee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articleeRepository->add($articlee);
            return $this->redirectToRoute('app_art_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('art/edit.html.twig', [
            'articlee' => $articlee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="app_art_delete", methods={"POST"})
     */
    public function delete(Request $request, Articlee $articlee, ArticleeRepository $articleeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articlee->getId(), $request->request->get('_token'))) {
            $articleeRepository->remove($articlee);
        }

        return $this->redirectToRoute('app_art_index', [], Response::HTTP_SEE_OTHER);
    }
}
