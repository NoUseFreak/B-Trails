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
    private $trails;

    /**
     * Color constructor.
     */
    public function __construct()
    {
        $this->trails = new ArrayCollection();
    }

    /**
     * Set trails
     *
     * @param ArrayCollection $trails
     * @return Shape
     */
    public function setTrails(ArrayCollection $trails)
    {
        $this->trails = $trails;

        return $this;
    }

    /**
     * Get trails
     *
     * @return ArrayCollection
     */
    public function getTrails()
    {
        return $this->trails;
    }

    /**
     * Get the human readable name.
     */
    function __toString()
    {
        return $this->getNode()->getTitle();
    }
}
