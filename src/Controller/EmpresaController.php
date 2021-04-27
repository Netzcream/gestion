<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\EmpresaType;
use App\Form\EmpresaBuscarType;
use App\Entity\Empresa;


/**
 * @IsGranted("ROLE_USER")
 * @Route({"en" :"/companies","es": "/empresas"})
 */
class EmpresaController extends AppController {
    /**
     * @Route("/", name="empresas")
     */
    public function index(Request $request): Response
    {
    	$em = $this->getManager();
    	$entities = null; 
        $form = $this->createForm(EmpresaBuscarType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entities = $em->getRepository(Empresa::class)->buscar($form->getData());
            }
        } else {
            $entities = $em->getRepository(Empresa::class)->todos();
            if (sizeof($entities) > 50) {
                $entities = null;
            }
        }
        return $this->render('empresa/index.html.twig', [
            'form' => $form->createView(),
            'entities' => $entities,
        ]);
    }
    /**
     * @Route({"en" :"/new","es": "/nuevo"}, name="empresas_nuevo")
     * @Route({"en" :"/edit/{id}","es": "/editar/{id}"}, name="empresas_editar")
     */
    public function formulario(Request $request, $id = null): Response
    {
        $em = $this->getManager();
        $entity = new Empresa();
        if ($id) {
            $entity = $em->getRepository(Empresa::class)->find($id);
        }
        $form = $this->createForm(EmpresaType::class, $entity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirectToRoute('empresas');
        }


        return $this->render('empresa/formulario.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
