<?php

namespace App\Controller;

use App\Entity\TipoRelacionPersonaEntidad;
use App\Form\TipoRelacionPersonaEntidadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/relacion/persona/entidad")
 */
class TipoRelacionPersonaEntidadController extends AbstractController
{
    /**
     * @Route("/", name="tipo_relacion_persona_entidad_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoRelacionPersonaEntidads = $this->getDoctrine()
            ->getRepository(TipoRelacionPersonaEntidad::class)
            ->findAll();

        return $this->render('tipo_relacion_persona_entidad/index.html.twig', [
            'tipo_relacion_persona_entidads' => $tipoRelacionPersonaEntidads,
        ]);
    }

    /**
     * @Route("/new", name="tipo_relacion_persona_entidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoRelacionPersonaEntidad = new TipoRelacionPersonaEntidad();
        $form = $this->createForm(TipoRelacionPersonaEntidadType::class, $tipoRelacionPersonaEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoRelacionPersonaEntidad);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_relacion_persona_entidad_index');
        }

        return $this->render('tipo_relacion_persona_entidad/new.html.twig', [
            'tipo_relacion_persona_entidad' => $tipoRelacionPersonaEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_relacion_persona_entidad_show", methods={"GET"})
     */
    public function show(TipoRelacionPersonaEntidad $tipoRelacionPersonaEntidad): Response
    {
        return $this->render('tipo_relacion_persona_entidad/show.html.twig', [
            'tipo_relacion_persona_entidad' => $tipoRelacionPersonaEntidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_relacion_persona_entidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoRelacionPersonaEntidad $tipoRelacionPersonaEntidad): Response
    {
        $form = $this->createForm(TipoRelacionPersonaEntidadType::class, $tipoRelacionPersonaEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_relacion_persona_entidad_index', [
                'id' => $tipoRelacionPersonaEntidad->getId(),
            ]);
        }

        return $this->render('tipo_relacion_persona_entidad/edit.html.twig', [
            'tipo_relacion_persona_entidad' => $tipoRelacionPersonaEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_relacion_persona_entidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoRelacionPersonaEntidad $tipoRelacionPersonaEntidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoRelacionPersonaEntidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoRelacionPersonaEntidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_relacion_persona_entidad_index');
    }
}
