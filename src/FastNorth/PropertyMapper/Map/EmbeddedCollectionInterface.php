<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\MapInterface;

/**
 * EmbeddedCollectionInterface
 *
 * An embedded collection
 */
interface EmbeddedCollectionInterface extends LinkInterface
{
    /**
     * Get the map for the collection
     */
    public function getMap();

    /**
     * Get the generator for new items
     *
     * @return callable
     */
    public function getGenerator();
}
