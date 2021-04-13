<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AppController
{

    /**
     * @Route("/", name="index")
     */
    public function index(): Response {
        return $this->render('landing/index.html.twig', [

        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route({"en" :"/home","es": "/inicio"}, name="home")
     */
    public function home(): Response {

        if ($this->getUser()) {
            return $this->render('home/index.html.twig', [

            ]);            
        } else {
            return $this->redirectToRoute('index');
        }

        
    }



    /**
     * @Route(
     *     "/home",
     *     name="mobile_home",
     *     host="{subdomain}.localhost",
     *     defaults={"subdomain"="m"},
     *     requirements={"subdomain"="m|mobile"}
     * )
     */
    public function mobileHomepage(): Response
    {
        // ...
    }

}
