<?php

namespace App\Controller;

use App\Entity\TipoElementoDotacion;
use App\Form\TipoElementoDotacionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/elemento/dotacion")
 */
class TipoElementoDotacionController extends AbstractController
{
    /**
     * @Route("/", name="tipo_elemento_dotacion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoElementoDotacions = $this->getDoctrine()
            ->getRepository(TipoElementoDotacion::class)
            ->findAll();

        return $this->render('tipo_elemento_dotacion/index.html.twig', [
            'tipo_elemento_dotacions' => $tipoElementoDotacions,
        ]);
    }

    /**
     * @Route("/new", name="tipo_elemento_dotacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoElementoDotacion = new TipoElementoDotacion();
        $form = $this->createForm(TipoElementoDotacionType::class, $tipoElementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoElementoDotacion);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_elemento_dotacion_index');
        }

        return $this->render('tipo_elemento_dotacion/new.html.twig', [
            'tipo_elemento_dotacion' => $tipoElementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_elemento_dotacion_show", methods={"GET"})
     */
    public function show(TipoElementoDotacion $tipoElementoDotacion): Response
    {
        return $this->render('tipo_elemento_dotacion/show.html.twig', [
            'tipo_elemento_dotacion' => $tipoElementoDotacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_elemento_dotacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoElementoDotacion $tipoElementoDotacion): Response
    {
        $form = $this->createForm(TipoElementoDotacionType::class, $tipoElementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_elemento_dotacion_index', [
                'id' => $tipoElementoDotacion->getId(),
            ]);
        }

        return $this->render('tipo_elemento_dotacion/edit.html.twig', [
            'tipo_elemento_dotacion' => $tipoElementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_elemento_dotacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoElementoDotacion $tipoElementoDotacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoElementoDotacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoElementoDotacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_elemento_dotacion_index');
    }
}
