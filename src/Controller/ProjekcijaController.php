<?php

namespace App\Controller;

use App\Entity\Projekcija;
use App\Form\ProjekcijaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/projekcija")
 */
class ProjekcijaController extends AbstractController
{
    /**
     * @Route("/", name="projekcija_index", methods={"GET"})
     */
    public function index(): Response
    {
        $projekcijas = $this->getDoctrine()
            ->getRepository(Projekcija::class)
            ->findAll();

        return $this->render('projekcija/index.html.twig', [
            'projekcijas' => $projekcijas,
        ]);
    }
    /**
     * @Route("/odabir", name="projekcija_user", methods={"GET"})
     */
    public function indexx(): Response
    {
        $projekcijas = $this->getDoctrine()
            ->getRepository(Projekcija::class)
            ->findAll();

        return $this->render('projekcija/indexx.html.twig', [
            'projekcijas' => $projekcijas,
        ]);
    }

    /**
     * @Route("/new", name="projekcija_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $projekcija = new Projekcija();
        $form = $this->createForm(ProjekcijaType::class, $projekcija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projekcija);
            $entityManager->flush();

            return $this->redirectToRoute('projekcija_index');
        }

        return $this->render('projekcija/new.html.twig', [
            'projekcija' => $projekcija,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProjekcija}", name="projekcija_show", methods={"GET"})
     */
    public function show(Projekcija $projekcija): Response
    {
        return $this->render('projekcija/show.html.twig', [
            'projekcija' => $projekcija,
        ]);
    }

    /**
     * @Route("/{idProjekcija}/edit", name="projekcija_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Projekcija $projekcija): Response
    {
        $form = $this->createForm(ProjekcijaType::class, $projekcija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projekcija_index');
        }

        return $this->render('projekcija/edit.html.twig', [
            'projekcija' => $projekcija,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idProjekcija}", name="projekcija_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Projekcija $projekcija): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projekcija->getIdProjekcija(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projekcija);
            $entityManager->flush();
        }

        return $this->redirectToRoute('projekcija_index');
    }
}
