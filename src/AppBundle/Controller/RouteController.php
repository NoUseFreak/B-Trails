<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RouteController extends Controller
{
    /**
     * @Route("/route/{id}", name="route_show")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $route = $em->getRepository('AppBundle:Route')->find($id);

        if (!$route) {
            throw $this->createNotFoundException('The route does not exist');
        }

        return $this->render(':Route:detail.html.twig', array('route' => $route));
    }
}
