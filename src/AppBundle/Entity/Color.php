<?php

namespace AppBundle\Entity;

use Clastic\TaxonomyBundle\Model\Taxonomy;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 */
class Color extends Taxonomy
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
     * @return Color
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
