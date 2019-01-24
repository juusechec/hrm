<?php

namespace App\Controller;

use App\Entity\TipoRelacionPersonas;
use App\Form\TipoRelacionPersonasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/relacion/personas")
 */
class TipoRelacionPersonasController extends AbstractController
{
    /**
     * @Route("/", name="tipo_relacion_personas_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoRelacionPersonas = $this->getDoctrine()
            ->getRepository(TipoRelacionPersonas::class)
            ->findAll();

        return $this->render('tipo_relacion_personas/index.html.twig', [
            'tipo_relacion_personas' => $tipoRelacionPersonas,
        ]);
    }

    /**
     * @Route("/new", name="tipo_relacion_personas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoRelacionPersona = new TipoRelacionPersonas();
        $form = $this->createForm(TipoRelacionPersonasType::class, $tipoRelacionPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoRelacionPersona);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_relacion_personas_index');
        }

        return $this->render('tipo_relacion_personas/new.html.twig', [
            'tipo_relacion_persona' => $tipoRelacionPersona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_relacion_personas_show", methods={"GET"})
     */
    public function show(TipoRelacionPersonas $tipoRelacionPersona): Response
    {
        return $this->render('tipo_relacion_personas/show.html.twig', [
            'tipo_relacion_persona' => $tipoRelacionPersona,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_relacion_personas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoRelacionPersonas $tipoRelacionPersona): Response
    {
        $form = $this->createForm(TipoRelacionPersonasType::class, $tipoRelacionPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_relacion_personas_index', [
                'id' => $tipoRelacionPersona->getId(),
            ]);
        }

        return $this->render('tipo_relacion_personas/edit.html.twig', [
            'tipo_relacion_persona' => $tipoRelacionPersona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_relacion_personas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoRelacionPersonas $tipoRelacionPersona): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoRelacionPersona->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoRelacionPersona);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_relacion_personas_index');
    }
}
