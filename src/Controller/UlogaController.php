<?php

namespace App\Controller;

use App\Entity\Uloga;
use App\Form\UlogaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/uloga")
 */
class UlogaController extends AbstractController
{
    /**
     * @Route("/", name="uloga_index", methods={"GET"})
     */
    public function index(): Response
    {
        $ulogas = $this->getDoctrine()
            ->getRepository(Uloga::class)
            ->findAll();

        return $this->render('uloga/index.html.twig', [
            'ulogas' => $ulogas,
        ]);
    }

    /**
     * @Route("/new", name="uloga_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uloga = new Uloga();
        $form = $this->createForm(UlogaType::class, $uloga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uloga);
            $entityManager->flush();

            return $this->redirectToRoute('uloga_index');
        }

        return $this->render('uloga/new.html.twig', [
            'uloga' => $uloga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUloga}", name="uloga_show", methods={"GET"})
     */
    public function show(Uloga $uloga): Response
    {
        return $this->render('uloga/show.html.twig', [
            'uloga' => $uloga,
        ]);
    }

    /**
     * @Route("/{idUloga}/edit", name="uloga_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Uloga $uloga): Response
    {
        $form = $this->createForm(UlogaType::class, $uloga);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uloga_index');
        }

        return $this->render('uloga/edit.html.twig', [
            'uloga' => $uloga,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUloga}", name="uloga_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Uloga $uloga): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uloga->getIdUloga(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uloga);
            $entityManager->flush();
        }

        return $this->redirectToRoute('uloga_index');
    }
}
