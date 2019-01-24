<?php

namespace App\Controller;

use App\Entity\EducacionSuperior;
use App\Form\EducacionSuperiorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/educacion/superior")
 */
class EducacionSuperiorController extends AbstractController
{
    /**
     * @Route("/", name="educacion_superior_index", methods={"GET"})
     */
    public function index(): Response
    {
        $educacionSuperiors = $this->getDoctrine()
            ->getRepository(EducacionSuperior::class)
            ->findAll();

        return $this->render('educacion_superior/index.html.twig', [
            'educacion_superiors' => $educacionSuperiors,
        ]);
    }

    /**
     * @Route("/new", name="educacion_superior_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $educacionSuperior = new EducacionSuperior();
        $form = $this->createForm(EducacionSuperiorType::class, $educacionSuperior);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($educacionSuperior);
            $entityManager->flush();

            return $this->redirectToRoute('educacion_superior_index');
        }

        return $this->render('educacion_superior/new.html.twig', [
            'educacion_superior' => $educacionSuperior,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_superior_show", methods={"GET"})
     */
    public function show(EducacionSuperior $educacionSuperior): Response
    {
        return $this->render('educacion_superior/show.html.twig', [
            'educacion_superior' => $educacionSuperior,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="educacion_superior_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EducacionSuperior $educacionSuperior): Response
    {
        $form = $this->createForm(EducacionSuperiorType::class, $educacionSuperior);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('educacion_superior_index', [
                'id' => $educacionSuperior->getId(),
            ]);
        }

        return $this->render('educacion_superior/edit.html.twig', [
            'educacion_superior' => $educacionSuperior,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_superior_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EducacionSuperior $educacionSuperior): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educacionSuperior->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($educacionSuperior);
            $entityManager->flush();
        }

        return $this->redirectToRoute('educacion_superior_index');
    }
}
