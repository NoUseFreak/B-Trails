<?php
/**
 * This file is part of the B-Trails package.
 *
 * (c) Dries De Peuter <dries@nousefreak.be>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Statistics;

use AppBundle\Entity\RouteRepository;

/**
 * @author Dries De Peuter <dries@nousefreak.be>
 */
class StatisticsService
{
    /**
     * @var RouteRepository
     */
    private $routeRepo;

    public function __construct(RouteRepository $routeRepo)
    {
        $this->routeRepo = $routeRepo;
    }

    public function getRouteTotal()
    {
        return $this->routeRepo
          ->getCount();
    }

    public function getDistanceTotal()
    {
        return $this->routeRepo
          ->getDistanceTotal();
    }
}
