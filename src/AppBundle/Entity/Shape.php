<?php

namespace AppBundle\Entity;

use Clastic\TaxonomyBundle\Model\Taxonomy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Shape
 */
class Shape extends Taxonomy
{
    /**
     * @var ArrayCollection
     */
    private $routes;

    /**
     * Color constructor.
     */
    public function __construct()
    {
        $this->routes = new ArrayCollection();
    }

    /**
     * Set routes
     *
     * @param ArrayCollection $routes
     * @return Shape
     */
    public function setRoutes(ArrayCollection $routes)
    {
        $this->routes = $routes;

        return $this;
    }

    /**
     * Get routes
     *
     * @return ArrayCollection
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Get the human readable name.
     */
    function __toString()
    {
        return $this->getNode()->getTitle();
    }
}
