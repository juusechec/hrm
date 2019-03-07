<?php

namespace App\Controller;

use App\Entity\Persona;
use App\Entity\EducacionBasicaMedia;
use App\Entity\EducacionSuperior;
use App\Entity\EducacionContinuada;
use App\Entity\Contrato;
use App\Entity\Vivienda;
use App\Form\PersonaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @Route("/empleado")
 */
class EmpleadoController extends AbstractController
{
    /**
     * @Route("/", name="empleado_index", methods={"GET"})
     */
    public function index(): Response
    {   
        // $personas = $this->getDoctrine()
        // ->getRepository(Persona::class)
        // ->createQueryBuilder('persona')
        // ->select('persona')
        // ->join('persona', 'contrato.id_persona')
        // ->getQuery()
        // ->getResult();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $empleados = $qb->select(array('p'))
            ->from(Persona::class, 'p')
            ->join(Contrato::class, 'c', Join::WITH, 'p.id=c.idPersona')
            // ->where('p.id = c.idPersona')
            // ->andWhere('e.user = :userName')
            // ->setParameter('userName', 'scott')
            // ->orderBy('e.created', 'ASC')
            ->getQuery()
            ->getResult();

        // $em = $this->getDoctrine()->getManager(); // ...or getEntityManager() prior to Symfony 2.1
        // $connection = $em->getConnection();
        // $statement = $connection->prepare(
        //     "SELECT p.*
        //     FROM public.persona AS p
        //     INNER JOIN public.contrato AS c
        //     ON p.id= c.id_persona
        //     "
        // );
        // // $statement->bindValue('id', 123);
        // $statement->execute();
        // $personas = $statement->fetchAll();
        // var_dump($personas); die;
        
        return $this->render('empleado/index.html.twig', [
            'personas' => $empleados,
        ]);
    }

    /**
     * @Route("/new", name="empleado_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $persona = new Persona();
        $form = $this->createForm(PersonaType::class, $persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($persona);
            $entityManager->flush();

            return $this->redirectToRoute('persona_index');
        }

        return $this->render('empleado/new.html.twig', [
            'persona' => $persona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empleado_show", methods={"GET"})
     */
    public function show(Persona $persona): Response
    {
        $viviendas = $this->getDoctrine()
            ->getRepository(Vivienda::class)
            ->findBy(
                array('idPersona' =>array($persona->getId()))  
            );
        
        $educacion_basica_medias = $this->getDoctrine()
            ->getRepository(EducacionBasicaMedia::class)
            ->findBy(
                array('idPersona' =>array($persona->getId()))  
            );

        $educacion_superiors = $this->getDoctrine()
            ->getRepository(EducacionSuperior::class)
            ->findBy(
                array('idPersona' =>array($persona->getId()))  
            );

        $educacion_continuadas = $this->getDoctrine()
            ->getRepository(EducacionContinuada::class)
            ->findBy(
                array('idPersona' =>array($persona->getId()))  
            );

        $contratos = $this->getDoctrine()
            ->getRepository(Contrato::class)
            ->findBy(
                array('idPersona' =>array($persona->getId()))  
            );

        return $this->render('empleado/show.html.twig', [
            'persona' => $persona,
            'educacion_basica_medias' => $educacion_basica_medias,
            'educacion_superiors' => $educacion_superiors,
            'educacion_continuadas' => $educacion_continuadas,
            'contratos' => $contratos,
            'viviendas' => $viviendas
        ]);
    }

    /**
     * @Route("/{id}/edit", name="empleado_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Persona $persona): Response
    {
        $form = $this->createForm(PersonaType::class, $persona);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('empleado_index', [
                'id' => $persona->getId(),
            ]);
        }

        return $this->render('empleado/edit.html.twig', [
            'persona' => $persona,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="empleado_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Persona $persona): Response
    {
        if ($this->isCsrfTokenValid('delete'.$persona->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($persona);
            $entityManager->flush();
        }

        return $this->redirectToRoute('empleado_index');
    }
}
