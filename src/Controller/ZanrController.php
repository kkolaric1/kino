<?php

namespace App\Controller;

use App\Entity\Zanr;
use App\Form\ZanrType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zanr")
 */
class ZanrController extends AbstractController
{
    /**
     * @Route("/", name="zanr_index", methods={"GET"})
     */
    public function index(): Response
    {
        $zanrs = $this->getDoctrine()
            ->getRepository(Zanr::class)
            ->findAll();

        return $this->render('zanr/index.html.twig', [
            'zanrs' => $zanrs,
        ]);
    }

    /**
     * @Route("/new", name="zanr_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zanr = new Zanr();
        $form = $this->createForm(ZanrType::class, $zanr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zanr);
            $entityManager->flush();

            return $this->redirectToRoute('zanr_index');
        }

        return $this->render('zanr/new.html.twig', [
            'zanr' => $zanr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idZanr}", name="zanr_show", methods={"GET"})
     */
    public function show(Zanr $zanr): Response
    {
        return $this->render('zanr/show.html.twig', [
            'zanr' => $zanr,
        ]);
    }

    /**
     * @Route("/{idZanr}/edit", name="zanr_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Zanr $zanr): Response
    {
        $form = $this->createForm(ZanrType::class, $zanr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zanr_index');
        }

        return $this->render('zanr/edit.html.twig', [
            'zanr' => $zanr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idZanr}", name="zanr_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Zanr $zanr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zanr->getIdZanr(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zanr);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zanr_index');
    }
}
