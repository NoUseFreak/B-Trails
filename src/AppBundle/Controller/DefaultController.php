<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $routes = $em->getRepository('AppBundle:Route')->findAll();

        return $this->render(':Default:index.html.twig', array('routes' => $routes));
    }
}
