<?php

namespace App\Controller;

use App\Entity\Otrosi;
use App\Form\OtrosiType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/otrosi")
 */
class OtrosiController extends AbstractController
{
    /**
     * @Route("/", name="otrosi_index", methods={"GET"})
     */
    public function index(): Response
    {
        $otrosis = $this->getDoctrine()
            ->getRepository(Otrosi::class)
            ->findAll();

        return $this->render('otrosi/index.html.twig', [
            'otrosis' => $otrosis,
        ]);
    }

    /**
     * @Route("/new", name="otrosi_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $otrosi = new Otrosi();
        $form = $this->createForm(OtrosiType::class, $otrosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($otrosi);
            $entityManager->flush();

            return $this->redirectToRoute('otrosi_index');
        }

        return $this->render('otrosi/new.html.twig', [
            'otrosi' => $otrosi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="otrosi_show", methods={"GET"})
     */
    public function show(Otrosi $otrosi): Response
    {
        return $this->render('otrosi/show.html.twig', [
            'otrosi' => $otrosi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="otrosi_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Otrosi $otrosi): Response
    {
        $form = $this->createForm(OtrosiType::class, $otrosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('otrosi_index', [
                'id' => $otrosi->getId(),
            ]);
        }

        return $this->render('otrosi/edit.html.twig', [
            'otrosi' => $otrosi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="otrosi_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Otrosi $otrosi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$otrosi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($otrosi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('otrosi_index');
    }
}
