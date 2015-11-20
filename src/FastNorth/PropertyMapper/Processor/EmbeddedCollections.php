<?php

namespace FastNorth\PropertyMapper\Processor;

use FastNorth\PropertyMapper\MapInterface;
use FastNorth\PropertyMapper\Mapper;

/**
 * EmbeddedCollections
 *
 * Maps embedded collections
 */
class EmbeddedCollections extends Processor
{
    /**
     * Process the embedded collections of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    public function process($from, &$to, MapInterface $map)
    {
        $mapper = new Mapper($this->propertyAccess);

        foreach ($map->getEmbeddedCollections() as $collection) {
            // New value
            $value = [];

            // Source items
            $source = $this->propertyAccess->getValue($from, $collection->getFrom());

            foreach($source as $item) {
                $newItem = $collection->getFactory()->factory($item);
                $value[] = $mapper->process($item, $newItem, $collection->getMap());
            }

            $this->propertyAccess->setValue($to, $collection->getTo(), $value);
        }

        return $this;
    }

    /**
     * Reverse the property links of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    public function reverse(&$from, $to, MapInterface $map)
    {
        $mapper = new Mapper($this->propertyAccess);

        foreach ($map->getEmbeddedCollections() as $collection) {
            // New value
            $value = [];

            // Source items
            $source = $this->propertyAccess->getValue($to, $collection->getTo());

            foreach($source as $item) {
                $newItem = $collection->getFactory()->reverse($item);
                $value[] = $mapper->reverse($newItem, $item, $collection->getMap());
            }

            $this->propertyAccess->setValue($from, $collection->getFrom(), $value);
        }

        return $this;
    }
}

