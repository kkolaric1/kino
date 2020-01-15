<?php

namespace App\Controller;

use App\Entity\Korisnik;
use App\Form\KorisnikType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/korisnik")
 */
class KorisnikController extends AbstractController
{
    /**
     * @Route("/", name="korisnik_index", methods={"GET"})
     */
    public function index(): Response
    {
        $korisniks = $this->getDoctrine()
            ->getRepository(Korisnik::class)
            ->findAll();

        return $this->render('korisnik/index.html.twig', [
            'korisniks' => $korisniks,
        ]);
    }

    /**
     * @Route("/new", name="korisnik_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $korisnik = new Korisnik();
        $form = $this->createForm(KorisnikType::class, $korisnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($korisnik);
            $entityManager->flush();

            return $this->redirectToRoute('korisnik_index');
        }

        return $this->render('korisnik/new.html.twig', [
            'korisnik' => $korisnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idKorisnik}", name="korisnik_show", methods={"GET"})
     */
    public function show(Korisnik $korisnik): Response
    {
        return $this->render('korisnik/show.html.twig', [
            'korisnik' => $korisnik,
        ]);
    }

    /**
     * @Route("/{idKorisnik}/edit", name="korisnik_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Korisnik $korisnik): Response
    {
        $form = $this->createForm(KorisnikType::class, $korisnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('korisnik_index');
        }

        return $this->render('korisnik/edit.html.twig', [
            'korisnik' => $korisnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idKorisnik}", name="korisnik_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Korisnik $korisnik): Response
    {
        if ($this->isCsrfTokenValid('delete'.$korisnik->getIdKorisnik(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($korisnik);
            $entityManager->flush();
        }

        return $this->redirectToRoute('korisnik_index');
    }
}
