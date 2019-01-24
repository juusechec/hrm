<?php

namespace App\Controller;

use App\Entity\TipoProgramaExamenMedico;
use App\Form\TipoProgramaExamenMedicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/programa/examen/medico")
 */
class TipoProgramaExamenMedicoController extends AbstractController
{
    /**
     * @Route("/", name="tipo_programa_examen_medico_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoProgramaExamenMedicos = $this->getDoctrine()
            ->getRepository(TipoProgramaExamenMedico::class)
            ->findAll();

        return $this->render('tipo_programa_examen_medico/index.html.twig', [
            'tipo_programa_examen_medicos' => $tipoProgramaExamenMedicos,
        ]);
    }

    /**
     * @Route("/new", name="tipo_programa_examen_medico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoProgramaExamenMedico = new TipoProgramaExamenMedico();
        $form = $this->createForm(TipoProgramaExamenMedicoType::class, $tipoProgramaExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoProgramaExamenMedico);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_programa_examen_medico_index');
        }

        return $this->render('tipo_programa_examen_medico/new.html.twig', [
            'tipo_programa_examen_medico' => $tipoProgramaExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_programa_examen_medico_show", methods={"GET"})
     */
    public function show(TipoProgramaExamenMedico $tipoProgramaExamenMedico): Response
    {
        return $this->render('tipo_programa_examen_medico/show.html.twig', [
            'tipo_programa_examen_medico' => $tipoProgramaExamenMedico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_programa_examen_medico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoProgramaExamenMedico $tipoProgramaExamenMedico): Response
    {
        $form = $this->createForm(TipoProgramaExamenMedicoType::class, $tipoProgramaExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_programa_examen_medico_index', [
                'id' => $tipoProgramaExamenMedico->getId(),
            ]);
        }

        return $this->render('tipo_programa_examen_medico/edit.html.twig', [
            'tipo_programa_examen_medico' => $tipoProgramaExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_programa_examen_medico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoProgramaExamenMedico $tipoProgramaExamenMedico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoProgramaExamenMedico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoProgramaExamenMedico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_programa_examen_medico_index');
    }
}
