<?php

namespace App\Controller;

use App\Entity\ConceptoExamenMedico;
use App\Form\ConceptoExamenMedicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/concepto/examen/medico")
 */
class ConceptoExamenMedicoController extends AbstractController
{
    /**
     * @Route("/", name="concepto_examen_medico_index", methods={"GET"})
     */
    public function index(): Response
    {
        $conceptoExamenMedicos = $this->getDoctrine()
            ->getRepository(ConceptoExamenMedico::class)
            ->findAll();

        return $this->render('concepto_examen_medico/index.html.twig', [
            'concepto_examen_medicos' => $conceptoExamenMedicos,
        ]);
    }

    /**
     * @Route("/new", name="concepto_examen_medico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conceptoExamenMedico = new ConceptoExamenMedico();
        $form = $this->createForm(ConceptoExamenMedicoType::class, $conceptoExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conceptoExamenMedico);
            $entityManager->flush();

            return $this->redirectToRoute('concepto_examen_medico_index');
        }

        return $this->render('concepto_examen_medico/new.html.twig', [
            'concepto_examen_medico' => $conceptoExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concepto_examen_medico_show", methods={"GET"})
     */
    public function show(ConceptoExamenMedico $conceptoExamenMedico): Response
    {
        return $this->render('concepto_examen_medico/show.html.twig', [
            'concepto_examen_medico' => $conceptoExamenMedico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="concepto_examen_medico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConceptoExamenMedico $conceptoExamenMedico): Response
    {
        $form = $this->createForm(ConceptoExamenMedicoType::class, $conceptoExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('concepto_examen_medico_index', [
                'id' => $conceptoExamenMedico->getId(),
            ]);
        }

        return $this->render('concepto_examen_medico/edit.html.twig', [
            'concepto_examen_medico' => $conceptoExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="concepto_examen_medico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ConceptoExamenMedico $conceptoExamenMedico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conceptoExamenMedico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conceptoExamenMedico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('concepto_examen_medico_index');
    }
}
