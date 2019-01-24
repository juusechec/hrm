<?php

namespace App\Controller;

use App\Entity\ElementoDotacion;
use App\Form\ElementoDotacionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/elemento/dotacion")
 */
class ElementoDotacionController extends AbstractController
{
    /**
     * @Route("/", name="elemento_dotacion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $elementoDotacions = $this->getDoctrine()
            ->getRepository(ElementoDotacion::class)
            ->findAll();

        return $this->render('elemento_dotacion/index.html.twig', [
            'elemento_dotacions' => $elementoDotacions,
        ]);
    }

    /**
     * @Route("/new", name="elemento_dotacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $elementoDotacion = new ElementoDotacion();
        $form = $this->createForm(ElementoDotacionType::class, $elementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($elementoDotacion);
            $entityManager->flush();

            return $this->redirectToRoute('elemento_dotacion_index');
        }

        return $this->render('elemento_dotacion/new.html.twig', [
            'elemento_dotacion' => $elementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="elemento_dotacion_show", methods={"GET"})
     */
    public function show(ElementoDotacion $elementoDotacion): Response
    {
        return $this->render('elemento_dotacion/show.html.twig', [
            'elemento_dotacion' => $elementoDotacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="elemento_dotacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ElementoDotacion $elementoDotacion): Response
    {
        $form = $this->createForm(ElementoDotacionType::class, $elementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('elemento_dotacion_index', [
                'id' => $elementoDotacion->getId(),
            ]);
        }

        return $this->render('elemento_dotacion/edit.html.twig', [
            'elemento_dotacion' => $elementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="elemento_dotacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ElementoDotacion $elementoDotacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$elementoDotacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($elementoDotacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('elemento_dotacion_index');
    }
}
