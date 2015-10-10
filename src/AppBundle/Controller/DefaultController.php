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
        $trails = $em->getRepository('AppBundle:Trail')->findAll();

        return $this->render(':Default:index.html.twig', array('trails' => $trails));
    }
}
