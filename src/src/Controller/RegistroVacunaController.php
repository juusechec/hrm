<?php

namespace App\Controller;

use App\Entity\RegistroVacuna;
use App\Form\RegistroVacunaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/registro/vacuna")
 */
class RegistroVacunaController extends AbstractController
{
    /**
     * @Route("/", name="registro_vacuna_index", methods={"GET"})
     */
    public function index(): Response
    {
        $registroVacunas = $this->getDoctrine()
            ->getRepository(RegistroVacuna::class)
            ->findAll();

        return $this->render('registro_vacuna/index.html.twig', [
            'registro_vacunas' => $registroVacunas,
        ]);
    }

    /**
     * @Route("/new", name="registro_vacuna_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $registroVacuna = new RegistroVacuna();
        $form = $this->createForm(RegistroVacunaType::class, $registroVacuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($registroVacuna);
            $entityManager->flush();

            return $this->redirectToRoute('registro_vacuna_index');
        }

        return $this->render('registro_vacuna/new.html.twig', [
            'registro_vacuna' => $registroVacuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registro_vacuna_show", methods={"GET"})
     */
    public function show(RegistroVacuna $registroVacuna): Response
    {
        return $this->render('registro_vacuna/show.html.twig', [
            'registro_vacuna' => $registroVacuna,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="registro_vacuna_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RegistroVacuna $registroVacuna): Response
    {
        $form = $this->createForm(RegistroVacunaType::class, $registroVacuna);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('registro_vacuna_index', [
                'id' => $registroVacuna->getId(),
            ]);
        }

        return $this->render('registro_vacuna/edit.html.twig', [
            'registro_vacuna' => $registroVacuna,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="registro_vacuna_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RegistroVacuna $registroVacuna): Response
    {
        if ($this->isCsrfTokenValid('delete'.$registroVacuna->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($registroVacuna);
            $entityManager->flush();
        }

        return $this->redirectToRoute('registro_vacuna_index');
    }
}
