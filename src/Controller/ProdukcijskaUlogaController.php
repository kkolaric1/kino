<?php

namespace App\Controller;

use App\Entity\ProdukcijskaUloga;
use App\Form\ProdukcijskaUlogaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produkcijska/uloga")
 */
class ProdukcijskaUlogaController extends AbstractController
{
    /**
     * @Route("/", name="produkcijska_uloga_index", methods={"GET"})
     */
    public function index(): Response
    {
        $produkcijskaUlogas = $this->getDoctrine()
            ->getRepository(ProdukcijskaUloga::class)
            ->findAll();

        return $this->render('produkcijska_uloga/index.html.twig', [
            'produkcijska_ulogas' => $produkcijskaUlogas,
        ]);
    }

    /**
     * @Route("/new", name="produkcijska_uloga_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produkcijskaUloga = new ProdukcijskaUloga();
        $form = $this->createForm(ProdukcijskaUlogaType::class, $produkcijskaUloga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produkcijskaUloga);
            $entityManager->flush();

            return $this->redirectToRoute('produkcijska_uloga_index');
        }

        return $this->render('produkcijska_uloga/new.html.twig', [
            'produkcijska_uloga' => $produkcijskaUloga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProdukcijskauloga}", name="produkcijska_uloga_show", methods={"GET"})
     */
    public function show(ProdukcijskaUloga $produkcijskaUloga): Response
    {
        return $this->render('produkcijska_uloga/show.html.twig', [
            'produkcijska_uloga' => $produkcijskaUloga,
        ]);
    }

    /**
     * @Route("/{idProdukcijskauloga}/edit", name="produkcijska_uloga_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProdukcijskaUloga $produkcijskaUloga): Response
    {
        $form = $this->createForm(ProdukcijskaUlogaType::class, $produkcijskaUloga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produkcijska_uloga_index');
        }

        return $this->render('produkcijska_uloga/edit.html.twig', [
            'produkcijska_uloga' => $produkcijskaUloga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProdukcijskauloga}", name="produkcijska_uloga_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProdukcijskaUloga $produkcijskaUloga): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produkcijskaUloga->getIdProdukcijskauloga(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produkcijskaUloga);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produkcijska_uloga_index');
    }
}
