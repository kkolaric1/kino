<?php

namespace App\Controller;

use App\Entity\FilmOsoba;
use App\Form\FilmOsobaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/film/osoba")
 */
class FilmOsobaController extends AbstractController
{
    /**
     * @Route("/", name="film_osoba_index", methods={"GET"})
     */
    public function index(): Response
    {
        $filmOsobas = $this->getDoctrine()
            ->getRepository(FilmOsoba::class)
            ->findAll();

        return $this->render('film_osoba/index.html.twig', [
            'film_osobas' => $filmOsobas,
        ]);
    }

    /**
     * @Route("/new", name="film_osoba_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $filmOsoba = new FilmOsoba();
        $form = $this->createForm(FilmOsobaType::class, $filmOsoba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($filmOsoba);
            $entityManager->flush();

            return $this->redirectToRoute('film_osoba_index');
        }

        return $this->render('film_osoba/new.html.twig', [
            'film_osoba' => $filmOsoba,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{filmoviIdFilm}", name="film_osoba_show", methods={"GET"})
     */
    public function show(FilmOsoba $filmOsoba): Response
    {
        return $this->render('film_osoba/show.html.twig', [
            'film_osoba' => $filmOsoba,
        ]);
    }

    /**
     * @Route("/{filmoviIdFilm}/edit", name="film_osoba_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, FilmOsoba $filmOsoba): Response
    {
        $form = $this->createForm(FilmOsobaType::class, $filmOsoba);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('film_osoba_index');
        }

        return $this->render('film_osoba/edit.html.twig', [
            'film_osoba' => $filmOsoba,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{filmoviIdFilm}", name="film_osoba_delete", methods={"DELETE"})
     */
    public function delete(Request $request, FilmOsoba $filmOsoba): Response
    {
        if ($this->isCsrfTokenValid('delete'.$filmOsoba->getFilmoviIdFilm(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($filmOsoba);
            $entityManager->flush();
        }

        return $this->redirectToRoute('film_osoba_index');
    }
}
