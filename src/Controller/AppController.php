<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AppController extends AbstractController {

    protected function getParametro($request, $v) {
        return $request->request->get($v);
    }

    protected function getManager() {
        return $this->getDoctrine()->getManager();
    }
    protected function hasRol($rol = null) {
        if (empty($rol)) {
            return false;
        }
        return $this->isGranted($rol);
    }

    protected function regenerateIdCrm($entity) {
        $entity->setIdCrm(bin2hex(openssl_random_pseudo_bytes(4)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(6)));
    }

}
