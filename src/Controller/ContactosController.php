<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\ContactoType;
use App\Form\ContactoBuscarType;
use App\Entity\Cliente\Contacto;

/**
 * @IsGranted("ROLE_USER")
 * @Route({"en" :"/contacts","es": "/contactos"})
 */
class ContactosController extends AppController {
    /**
     * @Route("/", name="contactos")
     */
    public function index(Request $request): Response {
    	$em = $this->getManager('Cliente');
    	$entities = null; 
        $form = $this->createForm(ContactoBuscarType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $entities = $em->getRepository(Contacto::class)->buscar($form->getData());
            }
        } else {
            $entities = $em->getRepository(Contacto::class)->todos();
            if (sizeof($entities) > 50) {
                $entities = null;
            }
        }
        return $this->render('contacto/index.html.twig', [
            'form' => $form->createView(),
            'entities' => $entities,
        ]);
    }

    /**
     * @Route({"en" :"/new","es": "/nuevo"}, name="contactos_nuevo")
     * @Route({"en" :"/edit/{id}","es": "/editar/{id}"}, name="contactos_editar")
     */
    public function formulario(Request $request, $id = null): Response
    {
    	$em = $this->getManager('Cliente');
    	$entity = new Contacto();
    	if ($id) {
    		$entity = $em->getRepository(Contacto::class)->find($id);
    	}
    	$form = $this->createForm(ContactoType::class, $entity);
    	$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    		$em->persist($entity);
    		$em->flush();

    		return $this->redirectToRoute('contactos');
    	}


    	return $this->render('contacto/formulario.html.twig', [
    		'form' => $form->createView(),
    	]);
    }

}
