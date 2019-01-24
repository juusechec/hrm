<?php

namespace App\Controller;

use App\Entity\ExamenMedico;
use App\Form\ExamenMedicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/examen/medico")
 */
class ExamenMedicoController extends AbstractController
{
    /**
     * @Route("/", name="examen_medico_index", methods={"GET"})
     */
    public function index(): Response
    {
        $examenMedicos = $this->getDoctrine()
            ->getRepository(ExamenMedico::class)
            ->findAll();

        return $this->render('examen_medico/index.html.twig', [
            'examen_medicos' => $examenMedicos,
        ]);
    }

    /**
     * @Route("/new", name="examen_medico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $examenMedico = new ExamenMedico();
        $form = $this->createForm(ExamenMedicoType::class, $examenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($examenMedico);
            $entityManager->flush();

            return $this->redirectToRoute('examen_medico_index');
        }

        return $this->render('examen_medico/new.html.twig', [
            'examen_medico' => $examenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="examen_medico_show", methods={"GET"})
     */
    public function show(ExamenMedico $examenMedico): Response
    {
        return $this->render('examen_medico/show.html.twig', [
            'examen_medico' => $examenMedico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="examen_medico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ExamenMedico $examenMedico): Response
    {
        $form = $this->createForm(ExamenMedicoType::class, $examenMedico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('examen_medico_index', [
                'id' => $examenMedico->getId(),
            ]);
        }

        return $this->render('examen_medico/edit.html.twig', [
            'examen_medico' => $examenMedico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="examen_medico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ExamenMedico $examenMedico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$examenMedico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($examenMedico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('examen_medico_index');
    }
}
