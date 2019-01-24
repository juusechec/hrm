<?php

namespace App\Controller;

use App\Entity\EducacionBasicaMedia;
use App\Form\EducacionBasicaMediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/educacion/basica/media")
 */
class EducacionBasicaMediaController extends AbstractController
{
    /**
     * @Route("/", name="educacion_basica_media_index", methods={"GET"})
     */
    public function index(): Response
    {
        $educacionBasicaMedia = $this->getDoctrine()
            ->getRepository(EducacionBasicaMedia::class)
            ->findAll();

        return $this->render('educacion_basica_media/index.html.twig', [
            'educacion_basica_media' => $educacionBasicaMedia,
        ]);
    }

    /**
     * @Route("/new", name="educacion_basica_media_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $educacionBasicaMedia = new EducacionBasicaMedia();
        $form = $this->createForm(EducacionBasicaMediaType::class, $educacionBasicaMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($educacionBasicaMedia);
            $entityManager->flush();

            return $this->redirectToRoute('educacion_basica_media_index');
        }

        return $this->render('educacion_basica_media/new.html.twig', [
            'educacion_basica_media' => $educacionBasicaMedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_basica_media_show", methods={"GET"})
     */
    public function show(EducacionBasicaMedia $educacionBasicaMedia): Response
    {
        return $this->render('educacion_basica_media/show.html.twig', [
            'educacion_basica_media' => $educacionBasicaMedia,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="educacion_basica_media_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EducacionBasicaMedia $educacionBasicaMedia): Response
    {
        $form = $this->createForm(EducacionBasicaMediaType::class, $educacionBasicaMedia);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('educacion_basica_media_index', [
                'id' => $educacionBasicaMedia->getId(),
            ]);
        }

        return $this->render('educacion_basica_media/edit.html.twig', [
            'educacion_basica_media' => $educacionBasicaMedia,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="educacion_basica_media_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EducacionBasicaMedia $educacionBasicaMedia): Response
    {
        if ($this->isCsrfTokenValid('delete'.$educacionBasicaMedia->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($educacionBasicaMedia);
            $entityManager->flush();
        }

        return $this->redirectToRoute('educacion_basica_media_index');
    }
}
