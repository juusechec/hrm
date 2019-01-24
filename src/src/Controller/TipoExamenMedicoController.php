<?php

namespace App\Controller;

use App\Entity\TipoExamenMedico;
use App\Form\TipoExamenMedicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/examen/medico")
 */
class TipoExamenMedicoController extends AbstractController
{
    /**
     * @Route("/", name="tipo_examen_medico_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoExamenMedicos = $this->getDoctrine()
            ->getRepository(TipoExamenMedico::class)
            ->findAll();

        return $this->render('tipo_examen_medico/index.html.twig', [
            'tipo_examen_medicos' => $tipoExamenMedicos,
        ]);
    }

    /**
     * @Route("/new", name="tipo_examen_medico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoExamenMedico = new TipoExamenMedico();
        $form = $this->createForm(TipoExamenMedicoType::class, $tipoExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoExamenMedico);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_examen_medico_index');
        }

        return $this->render('tipo_examen_medico/new.html.twig', [
            'tipo_examen_medico' => $tipoExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_examen_medico_show", methods={"GET"})
     */
    public function show(TipoExamenMedico $tipoExamenMedico): Response
    {
        return $this->render('tipo_examen_medico/show.html.twig', [
            'tipo_examen_medico' => $tipoExamenMedico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_examen_medico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoExamenMedico $tipoExamenMedico): Response
    {
        $form = $this->createForm(TipoExamenMedicoType::class, $tipoExamenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_examen_medico_index', [
                'id' => $tipoExamenMedico->getId(),
            ]);
        }

        return $this->render('tipo_examen_medico/edit.html.twig', [
            'tipo_examen_medico' => $tipoExamenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_examen_medico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoExamenMedico $tipoExamenMedico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoExamenMedico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoExamenMedico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_examen_medico_index');
    }
}
