<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\FactoryInterface;
use FastNorth\PropertyMapper\MapInterface;

/**
 * EmbeddedCollectionInterface
 *
 * An embedded collection
 */
interface EmbeddedCollectionInterface extends LinkedInterface
{
    /**
     * Get the map for the collection
     *
     * @return MapInterface
     */
    public function getMap();

    /**
     * Get the factory for new items
     *
     * @return FactoryInterface
     */
    public function getFactory();
}
