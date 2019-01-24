<?php

namespace App\Controller;

use App\Entity\RelacionPersonas;
use App\Form\RelacionPersonasType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/relacion/personas")
 */
class RelacionPersonasController extends AbstractController
{
    /**
     * @Route("/", name="relacion_personas_index", methods={"GET"})
     */
    public function index(): Response
    {
        $relacionPersonas = $this->getDoctrine()
            ->getRepository(RelacionPersonas::class)
            ->findAll();

        return $this->render('relacion_personas/index.html.twig', [
            'relacion_personas' => $relacionPersonas,
        ]);
    }

    /**
     * @Route("/new", name="relacion_personas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $relacionPersona = new RelacionPersonas();
        $form = $this->createForm(RelacionPersonasType::class, $relacionPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($relacionPersona);
            $entityManager->flush();

            return $this->redirectToRoute('relacion_personas_index');
        }

        return $this->render('relacion_personas/new.html.twig', [
            'relacion_persona' => $relacionPersona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relacion_personas_show", methods={"GET"})
     */
    public function show(RelacionPersonas $relacionPersona): Response
    {
        return $this->render('relacion_personas/show.html.twig', [
            'relacion_persona' => $relacionPersona,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="relacion_personas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RelacionPersonas $relacionPersona): Response
    {
        $form = $this->createForm(RelacionPersonasType::class, $relacionPersona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relacion_personas_index', [
                'id' => $relacionPersona->getId(),
            ]);
        }

        return $this->render('relacion_personas/edit.html.twig', [
            'relacion_persona' => $relacionPersona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="relacion_personas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RelacionPersonas $relacionPersona): Response
    {
        if ($this->isCsrfTokenValid('delete'.$relacionPersona->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($relacionPersona);
            $entityManager->flush();
        }

        return $this->redirectToRoute('relacion_personas_index');
    }
}
