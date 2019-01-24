<?php

namespace App\Controller;

use App\Entity\ProcesoGestionIntegral;
use App\Form\ProcesoGestionIntegralType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/proceso/gestion/integral")
 */
class ProcesoGestionIntegralController extends AbstractController
{
    /**
     * @Route("/", name="proceso_gestion_integral_index", methods={"GET"})
     */
    public function index(): Response
    {
        $procesoGestionIntegrals = $this->getDoctrine()
            ->getRepository(ProcesoGestionIntegral::class)
            ->findAll();

        return $this->render('proceso_gestion_integral/index.html.twig', [
            'proceso_gestion_integrals' => $procesoGestionIntegrals,
        ]);
    }

    /**
     * @Route("/new", name="proceso_gestion_integral_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $procesoGestionIntegral = new ProcesoGestionIntegral();
        $form = $this->createForm(ProcesoGestionIntegralType::class, $procesoGestionIntegral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($procesoGestionIntegral);
            $entityManager->flush();

            return $this->redirectToRoute('proceso_gestion_integral_index');
        }

        return $this->render('proceso_gestion_integral/new.html.twig', [
            'proceso_gestion_integral' => $procesoGestionIntegral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proceso_gestion_integral_show", methods={"GET"})
     */
    public function show(ProcesoGestionIntegral $procesoGestionIntegral): Response
    {
        return $this->render('proceso_gestion_integral/show.html.twig', [
            'proceso_gestion_integral' => $procesoGestionIntegral,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="proceso_gestion_integral_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProcesoGestionIntegral $procesoGestionIntegral): Response
    {
        $form = $this->createForm(ProcesoGestionIntegralType::class, $procesoGestionIntegral);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proceso_gestion_integral_index', [
                'id' => $procesoGestionIntegral->getId(),
            ]);
        }

        return $this->render('proceso_gestion_integral/edit.html.twig', [
            'proceso_gestion_integral' => $procesoGestionIntegral,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proceso_gestion_integral_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ProcesoGestionIntegral $procesoGestionIntegral): Response
    {
        if ($this->isCsrfTokenValid('delete'.$procesoGestionIntegral->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($procesoGestionIntegral);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proceso_gestion_integral_index');
    }
}
