<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrailController extends Controller
{
    /**
     * @Route("/trail/{id}", name="trail_show")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $trail = $em->getRepository('AppBundle:Trail')->find($id);

        return $this->render(':Trail:detail.html.twig', array('trail' => $trail));
    }
}
