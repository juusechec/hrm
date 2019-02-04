<?php

namespace App\Controller;

use App\Entity\RelacionPersonaEntidad;
use App\Form\RelacionPersonaEntidadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/relacion/persona/entidad")
 */
class RelacionPersonaEntidadController extends AbstractController
{
    /**
     * @Route("/", name="relacion_persona_entidad_index", methods={"GET"})
     */
    public function index(): Response
    {
        $relacionPersonaEntidads = $this->getDoctrine()
            ->getRepository(RelacionPersonaEntidad::class)
            ->findAll();

        return $this->render('relacion_persona_entidad/index.html.twig', [
            'relacion_persona_entidads' => $relacionPersonaEntidads,
        ]);
    }

    /**
     * @Route("/new", name="relacion_persona_entidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $relacionPersonaEntidad = new RelacionPersonaEntidad();
        $form = $this->createForm(RelacionPersonaEntidadType::class, $relacionPersonaEntidad);
        $form->handleRequest($request);
        var_dump($form);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($relacionPersonaEntidad);
            $entityManager->flush();

            return $this->redirectToRoute('relacion_persona_entidad_index');
        }

        return $this->render('relacion_persona_entidad/new.html.twig', [
            'relacion_persona_entidad' => $relacionPersonaEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relacion_persona_entidad_show", methods={"GET"})
     */
    public function show(RelacionPersonaEntidad $relacionPersonaEntidad): Response
    {
        return $this->render('relacion_persona_entidad/show.html.twig', [
            'relacion_persona_entidad' => $relacionPersonaEntidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="relacion_persona_entidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RelacionPersonaEntidad $relacionPersonaEntidad): Response
    {
        $form = $this->createForm(RelacionPersonaEntidadType::class, $relacionPersonaEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relacion_persona_entidad_index', [
                'id' => $relacionPersonaEntidad->getId(),
            ]);
        }

        return $this->render('relacion_persona_entidad/edit.html.twig', [
            'relacion_persona_entidad' => $relacionPersonaEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relacion_persona_entidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RelacionPersonaEntidad $relacionPersonaEntidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$relacionPersonaEntidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($relacionPersonaEntidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('relacion_persona_entidad_index');
    }
}
