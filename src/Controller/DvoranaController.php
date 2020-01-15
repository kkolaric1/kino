<?php

namespace App\Controller;

use App\Entity\Dvorana;
use App\Form\DvoranaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dvorana")
 */
class DvoranaController extends AbstractController
{
    /**
     * @Route("/", name="dvorana_index", methods={"GET"})
     */
    public function index(): Response
    {
        $dvoranas = $this->getDoctrine()
            ->getRepository(Dvorana::class)
            ->findAll();

        return $this->render('dvorana/index.html.twig', [
            'dvoranas' => $dvoranas,
        ]);
    }

    /**
     * @Route("/new", name="dvorana_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $dvorana = new Dvorana();
        $form = $this->createForm(DvoranaType::class, $dvorana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($dvorana);
            $entityManager->flush();

            return $this->redirectToRoute('dvorana_index');
        }

        return $this->render('dvorana/new.html.twig', [
            'dvorana' => $dvorana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDvorana}", name="dvorana_show", methods={"GET"})
     */
    public function show(Dvorana $dvorana): Response
    {
        return $this->render('dvorana/show.html.twig', [
            'dvorana' => $dvorana,
        ]);
    }

    /**
     * @Route("/{idDvorana}/edit", name="dvorana_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Dvorana $dvorana): Response
    {
        $form = $this->createForm(DvoranaType::class, $dvorana);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dvorana_index');
        }

        return $this->render('dvorana/edit.html.twig', [
            'dvorana' => $dvorana,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idDvorana}", name="dvorana_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Dvorana $dvorana): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dvorana->getIdDvorana(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($dvorana);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dvorana_index');
    }
}
