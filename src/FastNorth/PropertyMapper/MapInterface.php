<?php

namespace FastNorth\PropertyMapper;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;
use FastNorth\PropertyMapper\Map\LinkInterface;

/**
 * MapInterface.
 *
 * Describes a set of links, collections and embeds between properties
 */
interface MapInterface
{
    /**
     * Add a link between two properties.
     *
     * @param string               $from
     * @param string               $to
     * @param TransformerInterface $transformer
     *
     * @return self
     */
    public function map($from, $to, TransformerInterface $transformer = null);

    /**
     * Get all links links
     *
     * @return LinkInterface[]
     */
    public function getLinks();
}
