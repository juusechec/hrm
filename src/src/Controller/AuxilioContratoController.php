<?php

namespace App\Controller;

use App\Entity\AuxilioContrato;
use App\Form\AuxilioContratoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/auxilio/contrato")
 */
class AuxilioContratoController extends AbstractController
{
    /**
     * @Route("/", name="auxilio_contrato_index", methods={"GET"})
     */
    public function index(): Response
    {
        $auxilioContratos = $this->getDoctrine()
            ->getRepository(AuxilioContrato::class)
            ->findAll();

        return $this->render('auxilio_contrato/index.html.twig', [
            'auxilio_contratos' => $auxilioContratos,
        ]);
    }

    /**
     * @Route("/new", name="auxilio_contrato_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
//        $request->setLocale('es_CO.utf8');
//        setlocale(LC_ALL,'es_CO');
//        setlocale(LC_ALL, 'es_CO.utf8') or die('Locale not installed');
//        $date = "24/11/2014";
//        $date = \DateTime::createFromFormat("d/m/Y", $string);
//        echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($date)));
//        setlocale(LC_ALL, "es_CO", 'Spanish_Spain', 'Spanish');
//        echo iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B de %Y", strtotime($date)));
        $auxilioContrato = new AuxilioContrato();
        $form = $this->createForm(AuxilioContratoType::class, $auxilioContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($auxilioContrato);
            $entityManager->flush();

            return $this->redirectToRoute('auxilio_contrato_index');
        }

        return $this->render('auxilio_contrato/new.html.twig', [
            'auxilio_contrato' => $auxilioContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="auxilio_contrato_show", methods={"GET"})
     */
    public function show(AuxilioContrato $auxilioContrato): Response
    {
        return $this->render('auxilio_contrato/show.html.twig', [
            'auxilio_contrato' => $auxilioContrato,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="auxilio_contrato_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AuxilioContrato $auxilioContrato): Response
    {
        $form = $this->createForm(AuxilioContratoType::class, $auxilioContrato);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('auxilio_contrato_index', [
                'id' => $auxilioContrato->getId(),
            ]);
        }

        return $this->render('auxilio_contrato/edit.html.twig', [
            'auxilio_contrato' => $auxilioContrato,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="auxilio_contrato_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AuxilioContrato $auxilioContrato): Response
    {
        if ($this->isCsrfTokenValid('delete'.$auxilioContrato->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($auxilioContrato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('auxilio_contrato_index');
    }
}
