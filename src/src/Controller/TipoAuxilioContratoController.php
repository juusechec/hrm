<?php

namespace App\Controller;

use App\Entity\TipoAuxilioContrato;
use App\Form\TipoAuxilioContratoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/auxilio/contrato")
 */
class TipoAuxilioContratoController extends AbstractController
{
    /**
     * @Route("/", name="tipo_auxilio_contrato_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoAuxilioContratos = $this->getDoctrine()
            ->getRepository(TipoAuxilioContrato::class)
            ->findAll();

        return $this->render('tipo_auxilio_contrato/index.html.twig', [
            'tipo_auxilio_contratos' => $tipoAuxilioContratos,
        ]);
    }

    /**
     * @Route("/new", name="tipo_auxilio_contrato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoAuxilioContrato = new TipoAuxilioContrato();
        $form = $this->createForm(TipoAuxilioContratoType::class, $tipoAuxilioContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoAuxilioContrato);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_auxilio_contrato_index');
        }

        return $this->render('tipo_auxilio_contrato/new.html.twig', [
            'tipo_auxilio_contrato' => $tipoAuxilioContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_auxilio_contrato_show", methods={"GET"})
     */
    public function show(TipoAuxilioContrato $tipoAuxilioContrato): Response
    {
        return $this->render('tipo_auxilio_contrato/show.html.twig', [
            'tipo_auxilio_contrato' => $tipoAuxilioContrato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_auxilio_contrato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoAuxilioContrato $tipoAuxilioContrato): Response
    {
        $form = $this->createForm(TipoAuxilioContratoType::class, $tipoAuxilioContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_auxilio_contrato_index', [
                'id' => $tipoAuxilioContrato->getId(),
            ]);
        }

        return $this->render('tipo_auxilio_contrato/edit.html.twig', [
            'tipo_auxilio_contrato' => $tipoAuxilioContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_auxilio_contrato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoAuxilioContrato $tipoAuxilioContrato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoAuxilioContrato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoAuxilioContrato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_auxilio_contrato_index');
    }
}
