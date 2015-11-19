<?php

namespace FastNorth\PropertyMapper;

/**
 * MapperInterface.
 *
 * The mapper takes a map and moves properties from one to another
 */
interface MapperInterface
{
    /**
     * Apply map to two entities.
     *
     * @param array|object $from
     * @param array|object $to taken by reference
     * @param MapInterface $map
     */
    public function process($from, &$to, MapInterface $map);

    /**
     * Reversed apply of map to two entities.
     *
     * @param array|object $from taken by reference
     * @param array|object $to
     * @param MapInterface $map
     */
    public function reverse(&$from, $to, MapInterface $map);
}
