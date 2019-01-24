<?php

namespace App\Controller;

use App\Entity\TipoVivienda;
use App\Form\TipoViviendaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/vivienda")
 */
class TipoViviendaController extends AbstractController
{
    /**
     * @Route("/", name="tipo_vivienda_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoViviendas = $this->getDoctrine()
            ->getRepository(TipoVivienda::class)
            ->findAll();

        return $this->render('tipo_vivienda/index.html.twig', [
            'tipo_viviendas' => $tipoViviendas,
        ]);
    }

    /**
     * @Route("/new", name="tipo_vivienda_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoVivienda = new TipoVivienda();
        $form = $this->createForm(TipoViviendaType::class, $tipoVivienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoVivienda);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_vivienda_index');
        }

        return $this->render('tipo_vivienda/new.html.twig', [
            'tipo_vivienda' => $tipoVivienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_vivienda_show", methods={"GET"})
     */
    public function show(TipoVivienda $tipoVivienda): Response
    {
        return $this->render('tipo_vivienda/show.html.twig', [
            'tipo_vivienda' => $tipoVivienda,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_vivienda_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoVivienda $tipoVivienda): Response
    {
        $form = $this->createForm(TipoViviendaType::class, $tipoVivienda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_vivienda_index', [
                'id' => $tipoVivienda->getId(),
            ]);
        }

        return $this->render('tipo_vivienda/edit.html.twig', [
            'tipo_vivienda' => $tipoVivienda,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_vivienda_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoVivienda $tipoVivienda): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoVivienda->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoVivienda);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_vivienda_index');
    }
}
