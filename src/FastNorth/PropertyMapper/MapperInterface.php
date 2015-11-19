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
     * @param array|object $to
     * @param MapInterface $map
     *
     * @return array|object the mapped "to" entity passed in $to
     */
    public function process($from, &$to, MapInterface $map);

    /**
     * Reversed apply of map to two entities.
     *
     * Note that the parameter order is preserved between `process()` and
     * `reverse()`, it is the mapping that is reversed.
     *
     * @param array|object $from
     * @param array|object $to
     * @param MapInterface $map
     *
     * @return array|object the mapped "from" entity passed in $from
     */
    public function reverse(&$from, $to, MapInterface $map);
}
