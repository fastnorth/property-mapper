<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\MapInterface;
use FastNorth\PropertyMapper\FactoryInterface;

/**
 * EmbeddedInterface
 *
 * Maps embedded entities
 */
interface EmbeddedInterface
{
    /**
     * Get the to property
     *
     * @return string
     */
    public function getTo();

    /**
     * Get the map
     *
     * @return MapInterface
     */
    public function getMap();

    /**
     * Get the object factory
     *
     * @return FactoryInterface
     */
    public function getFactory();
}
