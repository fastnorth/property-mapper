<?php

namespace FastNorth\PropertyMapper;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;
use FastNorth\PropertyMapper\Map\Link;
use FastNorth\PropertyMapper\Map\EmbeddedCollection;

/**
 * Map
 *
 * A map describing a way to map one or more properties into one another
 */
class Map implements MapInterface
{
    /**
     * Set of links
     *
     * @var Link[]
     */
    private $links = [];

    /**
     * Embedded collections
     *
     * @var MappedCollection[]
     */
    private $embeddedCollections = [];

    /**
     * @inheritDoc
     */
    public function map($from, $to, TransformerInterface $transformer = null)
    {
        $this->links[] = new Link($from, $to, $transformer);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @inheritDoc
     */
    public function embedCollection($from, $to, MapInterface $map, callable $generator)
    {
        $this->embeddedCollections[] = new EmbeddedCollection($from, $to, $map, $generator);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEmbeddedCollections()
    {
        return $this->embeddedCollections;
    }
}
