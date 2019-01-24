<?php

namespace App\Controller;

use App\Entity\Entidad;
use App\Form\EntidadType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entidad")
 */
class EntidadController extends AbstractController
{
    /**
     * @Route("/", name="entidad_index", methods={"GET"})
     */
    public function index(): Response
    {
        $entidads = $this->getDoctrine()
            ->getRepository(Entidad::class)
            ->findAll();

        return $this->render('entidad/index.html.twig', [
            'entidads' => $entidads,
        ]);
    }

    /**
     * @Route("/new", name="entidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $entidad = new Entidad();
        $form = $this->createForm(EntidadType::class, $entidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entidad);
            $entityManager->flush();

            return $this->redirectToRoute('entidad_index');
        }

        return $this->render('entidad/new.html.twig', [
            'entidad' => $entidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entidad_show", methods={"GET"})
     */
    public function show(Entidad $entidad): Response
    {
        return $this->render('entidad/show.html.twig', [
            'entidad' => $entidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="entidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Entidad $entidad): Response
    {
        $form = $this->createForm(EntidadType::class, $entidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('entidad_index', [
                'id' => $entidad->getId(),
            ]);
        }

        return $this->render('entidad/edit.html.twig', [
            'entidad' => $entidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="entidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Entidad $entidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$entidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($entidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('entidad_index');
    }
}
