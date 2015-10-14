<?php

namespace AppBundle\Entity;

use Clastic\NodeBundle\Node\NodeReferenceInterface;
use Clastic\NodeBundle\Node\NodeReferenceTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Trail
 */
class Trail implements NodeReferenceInterface
{
    use NodeReferenceTrait;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $distance;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $shape;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var string
     */
    private $gpxFileName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="trail_gpx", fileNameProperty="gpxFileName")
     *
     * @var File
     */
    private $gpxFile;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set distance
     *
     * @param float $distance
     * @return Trail
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return float 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Trail
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set shape
     *
     * @param string $shape
     * @return Trail
     */
    public function setShape($shape)
    {
        $this->shape = $shape;

        return $this;
    }

    /**
     * Get shape
     *
     * @return string 
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * Set location
     *
     * @param Location $location
     * @return Trail
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set gpxfilename
     *
     * @param string $gpxFileName
     * @return Trail
     */
    public function setGpxFileName($gpxFileName)
    {
        $this->gpxFileName = $gpxFileName;

        return $this;
    }

    /**
     * Get gpxfilename
     *
     * @return string
     */
    public function getGpxFileName()
    {
        return $this->gpxFileName;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $gpx
     */
    public function setGpxFile(File $gpx = null)
    {
        $this->gpxFile = $gpx;

        if ($gpx) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->getNode()->setChanged(new \DateTime('now'));
        }
    }

    /**
     * @return File
     */
    public function getGpxFile()
    {
        return $this->gpxFile;
    }
}
