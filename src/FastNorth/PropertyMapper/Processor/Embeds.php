<?php

namespace FastNorth\PropertyMapper\Processor;

use FastNorth\PropertyMapper\MapInterface;
use FastNorth\PropertyMapper\Mapper;

/**
 * Embeds
 *
 * Processes embeds
 */
class Embeds extends Processor
{
    /**
     * Process the embeds of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    public function process($from, &$to, MapInterface $map)
    {
        $mapper = new Mapper;
        foreach ($map->getEmbeds() as $embed) {

            // Create new embedded
            $embedded = $embed->getFactory()->factory($from);

            // Process the embedded
            (new Mapper($this->propertyAccess))->process($from, $embedded, $embed->getMap());

            $this->propertyAccess->setValue($to, $embed->getTo(), $embedded);
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
        $mapper = new Mapper;
        foreach ($map->getEmbeds() as $embed) {
            // Get embedded value from $to
            $originalEmbedded = $this->propertyAccess->getValue($to, $embed->getTo());

            // Process the embedded
            (new Mapper($this->propertyAccess))->reverse($from, $originalEmbedded, $embed->getMap());
        }

        return $this;
    }
}

