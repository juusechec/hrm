<?php

namespace App\Controller;

use App\Entity\Contrato;
use App\Entity\Persona;
use App\Form\ContratoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Utils\JsChannel;

/**
 * @Route("/contrato")
 */
class ContratoController extends AbstractController
{
    /**
     * @Route("/", name="contrato_index", methods={"GET"})
     */
    public function index(): Response
    {
        $contratos = $this->getDoctrine()
            ->getRepository(Contrato::class)
            ->findAll();

        return $this->render('contrato/index.html.twig', [
            'contratos' => $contratos,
        ]);
    }

    /**
     * @Route("/new", name="contrato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contrato = new Contrato();
        $form = $this->createForm(ContratoType::class, $contrato);

        $idPersona = $request->query->get('id_persona');
        if ($idPersona != null) {
            $persona = $this->getDoctrine()
                ->getRepository(Persona::class)
                ->find($idPersona);
            $contrato->setIdPersona($persona);
            $form->add('idPersona', null, array(
                'data' => $persona
            ));
        }

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contrato);
            $entityManager->flush();
            if ($idPersona != null) {
                return JsChannel::reloadAndClose();
            }
            return $this->redirectToRoute('contrato_index');
        }

        return $this->render('contrato/new.html.twig', [
            'contrato' => $contrato,
            'form' => $form->createView(),
            'persona' => $idPersona
        ]);
    }

    /**
     * @Route("/{id}", name="contrato_show", methods={"GET"})
     */
    public function show(Contrato $contrato): Response
    {
        return $this->render('contrato/show.html.twig', [
            'contrato' => $contrato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contrato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contrato $contrato): Response
    {
        $form = $this->createForm(ContratoType::class, $contrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contrato_index', [
                'id' => $contrato->getId(),
            ]);
        }

        return $this->render('contrato/edit.html.twig', [
            'contrato' => $contrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contrato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contrato $contrato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contrato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contrato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contrato_index');
    }
}
