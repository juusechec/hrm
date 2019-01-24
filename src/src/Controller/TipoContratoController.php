<?php

namespace App\Controller;

use App\Entity\TipoContrato;
use App\Form\TipoContratoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/contrato")
 */
class TipoContratoController extends AbstractController
{
    /**
     * @Route("/", name="tipo_contrato_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoContratos = $this->getDoctrine()
            ->getRepository(TipoContrato::class)
            ->findAll();

        return $this->render('tipo_contrato/index.html.twig', [
            'tipo_contratos' => $tipoContratos,
        ]);
    }

    /**
     * @Route("/new", name="tipo_contrato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoContrato = new TipoContrato();
        $form = $this->createForm(TipoContratoType::class, $tipoContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoContrato);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_contrato_index');
        }

        return $this->render('tipo_contrato/new.html.twig', [
            'tipo_contrato' => $tipoContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_contrato_show", methods={"GET"})
     */
    public function show(TipoContrato $tipoContrato): Response
    {
        return $this->render('tipo_contrato/show.html.twig', [
            'tipo_contrato' => $tipoContrato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_contrato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoContrato $tipoContrato): Response
    {
        $form = $this->createForm(TipoContratoType::class, $tipoContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_contrato_index', [
                'id' => $tipoContrato->getId(),
            ]);
        }

        return $this->render('tipo_contrato/edit.html.twig', [
            'tipo_contrato' => $tipoContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_contrato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoContrato $tipoContrato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoContrato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoContrato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_contrato_index');
    }
}
