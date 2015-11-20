<?php

namespace FastNorth\PropertyMapper;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;
use FastNorth\PropertyMapper\Map\LinkInterface;
use FastNorth\PropertyMapper\Map\MappedCollectionInterface;

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
     * Get all links.
     *
     * @return LinkInterface[]
     */
    public function getLinks();

    /**
     * Embed a collection of items.
     *
     * @param string       $from
     * @param string       $to   should point to iterable property
     * @param MapInterface $map  the map to apply to each item
     * @param callable $generator generator for new items
     *
     * @return self
     */
    public function embedCollection($from, $to, MapInterface $map, callable $generator);

    /**
     * Get all embedded collections.
     *
     * @return MappedCollectionInterface[]
     */
    public function getEmbeddedCollections();
}

