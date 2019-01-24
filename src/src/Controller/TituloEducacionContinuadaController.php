<?php

namespace App\Controller;

use App\Entity\TituloEducacionContinuada;
use App\Form\TituloEducacionContinuadaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/titulo/educacion/continuada")
 */
class TituloEducacionContinuadaController extends AbstractController
{
    /**
     * @Route("/", name="titulo_educacion_continuada_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tituloEducacionContinuadas = $this->getDoctrine()
            ->getRepository(TituloEducacionContinuada::class)
            ->findAll();

        return $this->render('titulo_educacion_continuada/index.html.twig', [
            'titulo_educacion_continuadas' => $tituloEducacionContinuadas,
        ]);
    }

    /**
     * @Route("/new", name="titulo_educacion_continuada_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tituloEducacionContinuada = new TituloEducacionContinuada();
        $form = $this->createForm(TituloEducacionContinuadaType::class, $tituloEducacionContinuada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tituloEducacionContinuada);
            $entityManager->flush();

            return $this->redirectToRoute('titulo_educacion_continuada_index');
        }

        return $this->render('titulo_educacion_continuada/new.html.twig', [
            'titulo_educacion_continuada' => $tituloEducacionContinuada,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulo_educacion_continuada_show", methods={"GET"})
     */
    public function show(TituloEducacionContinuada $tituloEducacionContinuada): Response
    {
        return $this->render('titulo_educacion_continuada/show.html.twig', [
            'titulo_educacion_continuada' => $tituloEducacionContinuada,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="titulo_educacion_continuada_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TituloEducacionContinuada $tituloEducacionContinuada): Response
    {
        $form = $this->createForm(TituloEducacionContinuadaType::class, $tituloEducacionContinuada);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('titulo_educacion_continuada_index', [
                'id' => $tituloEducacionContinuada->getId(),
            ]);
        }

        return $this->render('titulo_educacion_continuada/edit.html.twig', [
            'titulo_educacion_continuada' => $tituloEducacionContinuada,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="titulo_educacion_continuada_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TituloEducacionContinuada $tituloEducacionContinuada): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tituloEducacionContinuada->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tituloEducacionContinuada);
            $entityManager->flush();
        }

        return $this->redirectToRoute('titulo_educacion_continuada_index');
    }
}
