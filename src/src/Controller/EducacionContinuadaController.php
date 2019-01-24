<?php

namespace App\Controller;

use App\Entity\EducacionContinuada;
use App\Form\EducacionContinuadaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/educacion/continuada")
 */
class EducacionContinuadaController extends AbstractController
{
    /**
     * @Route("/", name="educacion_continuada_index", methods={"GET"})
     */
    public function index(): Response
    {
        $educacionContinuadas = $this->getDoctrine()
            ->getRepository(EducacionContinuada::class)
            ->findAll();

        return $this->render('educacion_continuada/index.html.twig', [
            'educacion_continuadas' => $educacionContinuadas,
        ]);
    }

    /**
     * @Route("/new", name="educacion_continuada_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $educacionContinuada = new EducacionContinuada();
        $form = $this->createForm(EducacionContinuadaType::class, $educacionContinuada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($educacionContinuada);
            $entityManager->flush();

            return $this->redirectToRoute('educacion_continuada_index');
        }

        return $this->render('educacion_continuada/new.html.twig', [
            'educacion_continuada' => $educacionContinuada,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_continuada_show", methods={"GET"})
     */
    public function show(EducacionContinuada $educacionContinuada): Response
    {
        return $this->render('educacion_continuada/show.html.twig', [
            'educacion_continuada' => $educacionContinuada,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="educacion_continuada_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EducacionContinuada $educacionContinuada): Response
    {
        $form = $this->createForm(EducacionContinuadaType::class, $educacionContinuada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('educacion_continuada_index', [
                'id' => $educacionContinuada->getId(),
            ]);
        }

        return $this->render('educacion_continuada/edit.html.twig', [
            'educacion_continuada' => $educacionContinuada,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_continuada_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EducacionContinuada $educacionContinuada): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educacionContinuada->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($educacionContinuada);
            $entityManager->flush();
        }

        return $this->redirectToRoute('educacion_continuada_index');
    }
}
