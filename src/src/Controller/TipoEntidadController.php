<?php

namespace App\Controller;

use App\Entity\TipoEntidad;
use App\Form\TipoEntidadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/entidad")
 */
class TipoEntidadController extends AbstractController
{
    /**
     * @Route("/", name="tipo_entidad_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoEntidads = $this->getDoctrine()
            ->getRepository(TipoEntidad::class)
            ->findAll();

        return $this->render('tipo_entidad/index.html.twig', [
            'tipo_entidads' => $tipoEntidads,
        ]);
    }

    /**
     * @Route("/new", name="tipo_entidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoEntidad = new TipoEntidad();
        $form = $this->createForm(TipoEntidadType::class, $tipoEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoEntidad);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_entidad_index');
        }

        return $this->render('tipo_entidad/new.html.twig', [
            'tipo_entidad' => $tipoEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_entidad_show", methods={"GET"})
     */
    public function show(TipoEntidad $tipoEntidad): Response
    {
        return $this->render('tipo_entidad/show.html.twig', [
            'tipo_entidad' => $tipoEntidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_entidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoEntidad $tipoEntidad): Response
    {
        $form = $this->createForm(TipoEntidadType::class, $tipoEntidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_entidad_index', [
                'id' => $tipoEntidad->getId(),
            ]);
        }

        return $this->render('tipo_entidad/edit.html.twig', [
            'tipo_entidad' => $tipoEntidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_entidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoEntidad $tipoEntidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoEntidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoEntidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_entidad_index');
    }
}
