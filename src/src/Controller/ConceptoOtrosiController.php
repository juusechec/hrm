<?php

namespace App\Controller;

use App\Entity\ConceptoOtrosi;
use App\Form\ConceptoOtrosiType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/concepto/otrosi")
 */
class ConceptoOtrosiController extends AbstractController
{
    /**
     * @Route("/", name="concepto_otrosi_index", methods={"GET"})
     */
    public function index(): Response
    {
        $conceptoOtrosis = $this->getDoctrine()
            ->getRepository(ConceptoOtrosi::class)
            ->findAll();

        return $this->render('concepto_otrosi/index.html.twig', [
            'concepto_otrosis' => $conceptoOtrosis,
        ]);
    }

    /**
     * @Route("/new", name="concepto_otrosi_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conceptoOtrosi = new ConceptoOtrosi();
        $form = $this->createForm(ConceptoOtrosiType::class, $conceptoOtrosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conceptoOtrosi);
            $entityManager->flush();

            return $this->redirectToRoute('concepto_otrosi_index');
        }

        return $this->render('concepto_otrosi/new.html.twig', [
            'concepto_otrosi' => $conceptoOtrosi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concepto_otrosi_show", methods={"GET"})
     */
    public function show(ConceptoOtrosi $conceptoOtrosi): Response
    {
        return $this->render('concepto_otrosi/show.html.twig', [
            'concepto_otrosi' => $conceptoOtrosi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="concepto_otrosi_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConceptoOtrosi $conceptoOtrosi): Response
    {
        $form = $this->createForm(ConceptoOtrosiType::class, $conceptoOtrosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concepto_otrosi_index', [
                'id' => $conceptoOtrosi->getId(),
            ]);
        }

        return $this->render('concepto_otrosi/edit.html.twig', [
            'concepto_otrosi' => $conceptoOtrosi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concepto_otrosi_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ConceptoOtrosi $conceptoOtrosi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conceptoOtrosi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conceptoOtrosi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('concepto_otrosi_index');
    }
}
