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
        $em = $this->getDoctrine()->getManager();
        $routes = $em->getRepository('AppBundle:Route')->findAll();

        return $this->render(':Default:index.html.twig', [
          'routes' => $routes,
          'statistics' => [
              'count' => $this->getStatisticsService()->getRouteTotal(),
              'distance' => $this->getStatisticsService()->getDistanceTotal(),
          ],
        ]);
    }

    /**
     * @return \AppBundle\Statistics\StatisticsService
     */
    private function getStatisticsService()
    {
        return $this->get('app_bundle.service.statistics');
    }
}
