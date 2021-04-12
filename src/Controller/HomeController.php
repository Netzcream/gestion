<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

	#{
    # "en": "/about-us",
    # "nl": "/over-ons"
    # }

    /**
     * @Route({"en" :"/home","es": "/inicio"}, name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
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
