<?php

namespace App\Controller;

use App\Entity\TallaDotacion;
use App\Form\TallaDotacionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/talla/dotacion")
 */
class TallaDotacionController extends AbstractController
{
    /**
     * @Route("/", name="talla_dotacion_index", methods={"GET"})
     */
    public function index(): Response
    {
        $tallaDotacions = $this->getDoctrine()
            ->getRepository(TallaDotacion::class)
            ->findAll();

        return $this->render('talla_dotacion/index.html.twig', [
            'talla_dotacions' => $tallaDotacions,
        ]);
    }

    /**
     * @Route("/new", name="talla_dotacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tallaDotacion = new TallaDotacion();
        $form = $this->createForm(TallaDotacionType::class, $tallaDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tallaDotacion);
            $entityManager->flush();

            return $this->redirectToRoute('talla_dotacion_index');
        }

        return $this->render('talla_dotacion/new.html.twig', [
            'talla_dotacion' => $tallaDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="talla_dotacion_show", methods={"GET"})
     */
    public function show(TallaDotacion $tallaDotacion): Response
    {
        return $this->render('talla_dotacion/show.html.twig', [
            'talla_dotacion' => $tallaDotacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="talla_dotacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TallaDotacion $tallaDotacion): Response
    {
        $form = $this->createForm(TallaDotacionType::class, $tallaDotacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('talla_dotacion_index', [
                'id' => $tallaDotacion->getId(),
            ]);
        }

        return $this->render('talla_dotacion/edit.html.twig', [
            'talla_dotacion' => $tallaDotacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="talla_dotacion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TallaDotacion $tallaDotacion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tallaDotacion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tallaDotacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('talla_dotacion_index');
    }
}
