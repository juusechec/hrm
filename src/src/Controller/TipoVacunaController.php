<?php

namespace App\Controller;

use App\Entity\TipoVacuna;
use App\Form\TipoVacunaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tipo/vacuna")
 */
class TipoVacunaController extends AbstractController
{
    /**
     * @Route("/", name="tipo_vacuna_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tipoVacunas = $this->getDoctrine()
            ->getRepository(TipoVacuna::class)
            ->findAll();

        return $this->render('tipo_vacuna/index.html.twig', [
            'tipo_vacunas' => $tipoVacunas,
        ]);
    }

    /**
     * @Route("/new", name="tipo_vacuna_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tipoVacuna = new TipoVacuna();
        $form = $this->createForm(TipoVacunaType::class, $tipoVacuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tipoVacuna);
            $entityManager->flush();

            return $this->redirectToRoute('tipo_vacuna_index');
        }

        return $this->render('tipo_vacuna/new.html.twig', [
            'tipo_vacuna' => $tipoVacuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_vacuna_show", methods={"GET"})
     */
    public function show(TipoVacuna $tipoVacuna): Response
    {
        return $this->render('tipo_vacuna/show.html.twig', [
            'tipo_vacuna' => $tipoVacuna,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tipo_vacuna_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TipoVacuna $tipoVacuna): Response
    {
        $form = $this->createForm(TipoVacunaType::class, $tipoVacuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tipo_vacuna_index', [
                'id' => $tipoVacuna->getId(),
            ]);
        }

        return $this->render('tipo_vacuna/edit.html.twig', [
            'tipo_vacuna' => $tipoVacuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tipo_vacuna_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TipoVacuna $tipoVacuna): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tipoVacuna->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tipoVacuna);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tipo_vacuna_index');
    }
}
