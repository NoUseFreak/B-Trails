<?php

namespace AppBundle\Renamer;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;

/**
 * Class GpxFileRenamer
 *
 * @author Joeri van Dooren
 */
class GpxFileRenamer implements NamerInterface
{
    /**
     * @inheritDoc
     */
    public function name($object, PropertyMapping $mapping)
    {
        $file = $mapping->getFile($object);
        if ($extension = $this->getExtension($file)) {
            $originalFileName = str_replace(".{$extension}", "", $file->getClientOriginalName());
            $newFileName = trim(preg_replace('/-+/', "-", preg_replace('/[^a-z0-9]/', "-", strtolower($originalFileName))), '-');

            return sprintf('%s.%s', $newFileName, $extension);
        }

        return null;
    }

    /**
     * Get the file extension.
     *
     * @param UploadedFile $file
     *
     * @return mixed|null|string
     */
    private function getExtension(UploadedFile $file)
    {
        $originalName = $file->getClientOriginalName();

        if ($extension = pathinfo($originalName, PATHINFO_EXTENSION)) {
            return $extension;
        }

        if ($extension = $file->guessExtension()) {
            return $extension;
        }

        return null;
    }
}