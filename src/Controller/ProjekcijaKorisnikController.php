<?php

namespace App\Controller;

use App\Entity\ProjekcijaKorisnik;
use App\Form\ProjekcijaKorisnikType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projekcija/korisnik")
 */
class ProjekcijaKorisnikController extends AbstractController
{
    /**
     * @Route("/", name="projekcija_korisnik_index", methods={"GET"})
     */
    public function index(): Response
    {
        $projekcijaKorisniks = $this->getDoctrine()
            ->getRepository(ProjekcijaKorisnik::class)
            ->findAll();

        return $this->render('projekcija_korisnik/index.html.twig', [
            'projekcija_korisniks' => $projekcijaKorisniks,
        ]);
    }

    /**
     * @Route("/new", name="projekcija_korisnik_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $projekcijaKorisnik = new ProjekcijaKorisnik();
        $form = $this->createForm(ProjekcijaKorisnikType::class, $projekcijaKorisnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projekcijaKorisnik);
            $entityManager->flush();

            return $this->redirectToRoute('projekcija_korisnik_index');
        }

        return $this->render('projekcija_korisnik/new.html.twig', [
            'projekcija_korisnik' => $projekcijaKorisnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projekcijeIdProjekcija}", name="projekcija_korisnik_show", methods={"GET"})
     */
    public function show(ProjekcijaKorisnik $projekcijaKorisnik): Response
    {
        return $this->render('projekcija_korisnik/show.html.twig', [
            'projekcija_korisnik' => $projekcijaKorisnik,
        ]);
    }

    /**
     * @Route("/{projekcijeIdProjekcija}/edit", name="projekcija_korisnik_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProjekcijaKorisnik $projekcijaKorisnik): Response
    {
        $form = $this->createForm(ProjekcijaKorisnikType::class, $projekcijaKorisnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projekcija_korisnik_index');
        }

        return $this->render('projekcija_korisnik/edit.html.twig', [
            'projekcija_korisnik' => $projekcijaKorisnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{projekcijeIdProjekcija}", name="projekcija_korisnik_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProjekcijaKorisnik $projekcijaKorisnik): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projekcijaKorisnik->getProjekcijeIdProjekcija(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projekcijaKorisnik);
            $entityManager->flush();
        }

        return $this->redirectToRoute('projekcija_korisnik_index');
    }
}
