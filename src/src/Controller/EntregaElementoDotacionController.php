<?php

namespace App\Controller;

use App\Entity\EntregaElementoDotacion;
use App\Form\EntregaElementoDotacionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entrega/elemento/dotacion")
 */
class EntregaElementoDotacionController extends AbstractController
{
    /**
     * @Route("/", name="entrega_elemento_dotacion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entregaElementoDotacions = $this->getDoctrine()
            ->getRepository(EntregaElementoDotacion::class)
            ->findAll();

        return $this->render('entrega_elemento_dotacion/index.html.twig', [
            'entrega_elemento_dotacions' => $entregaElementoDotacions,
        ]);
    }

    /**
     * @Route("/new", name="entrega_elemento_dotacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entregaElementoDotacion = new EntregaElementoDotacion();
        $form = $this->createForm(EntregaElementoDotacionType::class, $entregaElementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entregaElementoDotacion);
            $entityManager->flush();

            return $this->redirectToRoute('entrega_elemento_dotacion_index');
        }

        return $this->render('entrega_elemento_dotacion/new.html.twig', [
            'entrega_elemento_dotacion' => $entregaElementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entrega_elemento_dotacion_show", methods={"GET"})
     */
    public function show(EntregaElementoDotacion $entregaElementoDotacion): Response
    {
        return $this->render('entrega_elemento_dotacion/show.html.twig', [
            'entrega_elemento_dotacion' => $entregaElementoDotacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="entrega_elemento_dotacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EntregaElementoDotacion $entregaElementoDotacion): Response
    {
        $form = $this->createForm(EntregaElementoDotacionType::class, $entregaElementoDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entrega_elemento_dotacion_index', [
                'id' => $entregaElementoDotacion->getId(),
            ]);
        }

        return $this->render('entrega_elemento_dotacion/edit.html.twig', [
            'entrega_elemento_dotacion' => $entregaElementoDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entrega_elemento_dotacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EntregaElementoDotacion $entregaElementoDotacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entregaElementoDotacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entregaElementoDotacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entrega_elemento_dotacion_index');
    }
}
