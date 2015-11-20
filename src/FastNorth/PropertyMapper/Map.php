<?php

namespace FastNorth\PropertyMapper;

use FastNorth\PropertyMapper\Transformer\TransformerInterface;
use FastNorth\PropertyMapper\Map\Link;
use FastNorth\PropertyMapper\Map\Embedded;
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
     * Embeds
     *
     * @var Embedded
     */
    private $embeds = [];

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
    public function embed($to, MapInterface $map, FactoryInterface $factory)
    {
        $this->embeds[] = new Embedded($to, $map, $factory);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEmbeds()
    {
        return $this->embeds;
    }

    /**
     * @inheritDoc
     */
    public function embedCollection($from, $to, MapInterface $map, FactoryInterface $factory)
    {
        $this->embeddedCollections[] = new EmbeddedCollection($from, $to, $map, $factory);

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
