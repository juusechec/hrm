<?php

namespace App\Controller;

use App\Entity\TituloAcademico;
use App\Form\TituloAcademicoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/titulo/academico")
 */
class TituloAcademicoController extends AbstractController
{
    /**
     * @Route("/", name="titulo_academico_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tituloAcademicos = $this->getDoctrine()
            ->getRepository(TituloAcademico::class)
            ->findAll();

        return $this->render('titulo_academico/index.html.twig', [
            'titulo_academicos' => $tituloAcademicos,
        ]);
    }

    /**
     * @Route("/new", name="titulo_academico_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tituloAcademico = new TituloAcademico();
        $form = $this->createForm(TituloAcademicoType::class, $tituloAcademico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tituloAcademico);
            $entityManager->flush();

            return $this->redirectToRoute('titulo_academico_index');
        }

        return $this->render('titulo_academico/new.html.twig', [
            'titulo_academico' => $tituloAcademico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulo_academico_show", methods={"GET"})
     */
    public function show(TituloAcademico $tituloAcademico): Response
    {
        return $this->render('titulo_academico/show.html.twig', [
            'titulo_academico' => $tituloAcademico,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="titulo_academico_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TituloAcademico $tituloAcademico): Response
    {
        $form = $this->createForm(TituloAcademicoType::class, $tituloAcademico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titulo_academico_index', [
                'id' => $tituloAcademico->getId(),
            ]);
        }

        return $this->render('titulo_academico/edit.html.twig', [
            'titulo_academico' => $tituloAcademico,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulo_academico_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TituloAcademico $tituloAcademico): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tituloAcademico->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tituloAcademico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('titulo_academico_index');
    }
}
