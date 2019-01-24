<?php

namespace App\Controller;

use App\Entity\ProrrogaContrato;
use App\Form\ProrrogaContratoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/prorroga/contrato")
 */
class ProrrogaContratoController extends AbstractController
{
    /**
     * @Route("/", name="prorroga_contrato_index", methods={"GET"})
     */
    public function index(): Response
    {
        $prorrogaContratos = $this->getDoctrine()
            ->getRepository(ProrrogaContrato::class)
            ->findAll();

        return $this->render('prorroga_contrato/index.html.twig', [
            'prorroga_contratos' => $prorrogaContratos,
        ]);
    }

    /**
     * @Route("/new", name="prorroga_contrato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $prorrogaContrato = new ProrrogaContrato();
        $form = $this->createForm(ProrrogaContratoType::class, $prorrogaContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prorrogaContrato);
            $entityManager->flush();

            return $this->redirectToRoute('prorroga_contrato_index');
        }

        return $this->render('prorroga_contrato/new.html.twig', [
            'prorroga_contrato' => $prorrogaContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prorroga_contrato_show", methods={"GET"})
     */
    public function show(ProrrogaContrato $prorrogaContrato): Response
    {
        return $this->render('prorroga_contrato/show.html.twig', [
            'prorroga_contrato' => $prorrogaContrato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="prorroga_contrato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProrrogaContrato $prorrogaContrato): Response
    {
        $form = $this->createForm(ProrrogaContratoType::class, $prorrogaContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prorroga_contrato_index', [
                'id' => $prorrogaContrato->getId(),
            ]);
        }

        return $this->render('prorroga_contrato/edit.html.twig', [
            'prorroga_contrato' => $prorrogaContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="prorroga_contrato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProrrogaContrato $prorrogaContrato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prorrogaContrato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prorrogaContrato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('prorroga_contrato_index');
    }
}
