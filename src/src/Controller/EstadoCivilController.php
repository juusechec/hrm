<?php

namespace App\Controller;

use App\Entity\EstadoCivil;
use App\Form\EstadoCivilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/estado/civil")
 */
class EstadoCivilController extends AbstractController
{
    /**
     * @Route("/", name="estado_civil_index", methods={"GET"})
     */
    public function index(): Response
    {
        $estadoCivils = $this->getDoctrine()
            ->getRepository(EstadoCivil::class)
            ->findAll();

        return $this->render('estado_civil/index.html.twig', [
            'estado_civils' => $estadoCivils,
        ]);
    }

    /**
     * @Route("/new", name="estado_civil_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $estadoCivil = new EstadoCivil();
        $form = $this->createForm(EstadoCivilType::class, $estadoCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($estadoCivil);
            $entityManager->flush();

            return $this->redirectToRoute('estado_civil_index');
        }

        return $this->render('estado_civil/new.html.twig', [
            'estado_civil' => $estadoCivil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estado_civil_show", methods={"GET"})
     */
    public function show(EstadoCivil $estadoCivil): Response
    {
        return $this->render('estado_civil/show.html.twig', [
            'estado_civil' => $estadoCivil,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="estado_civil_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EstadoCivil $estadoCivil): Response
    {
        $form = $this->createForm(EstadoCivilType::class, $estadoCivil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estado_civil_index', [
                'id' => $estadoCivil->getId(),
            ]);
        }

        return $this->render('estado_civil/edit.html.twig', [
            'estado_civil' => $estadoCivil,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="estado_civil_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EstadoCivil $estadoCivil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$estadoCivil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($estadoCivil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('estado_civil_index');
    }
}
