<?php

namespace FastNorth\PropertyMapper\Processor;

use FastNorth\PropertyMapper\MapInterface;

/**
 * Links
 *
 * Links processor
 */
class Links extends Processor
{
    /**
     * Process the property links of a map.
     *
     * @param object|array $from
     * @param object|array $to
     * @param MapInterface $map
     *
     * @return self
     */
    public function process($from, &$to, MapInterface $map)
    {
        foreach ($map->getLinks() as $link) {
            if ($link->hasTransformer()) {
                $value = $link->getTransformer()->transform(
                    $this->propertyAccess->getValue($from, $link->getFrom()),
                    $from
                );
            } else {
                $value = $this->propertyAccess->getValue($from, $link->getFrom());
            }

            $this->propertyAccess->setValue($to, $link->getTo(), $value);
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
        foreach ($map->getLinks() as $link) {
            if ($link->hasTransformer()) {
                $value = $link->getTransformer()->reverse(
                    $this->propertyAccess->getValue($to, $link->getTo()),
                    $to
                );
            } else {
                $value = $this->propertyAccess->getValue($to, $link->getTo());
            }

            $this->propertyAccess->setValue($from, $link->getFrom(), $value);
        }

        return $this;
    }
}

