<?php

namespace FastNorth\PropertyMapper;

use FastNorth\PropertyMapper\Transfomer\TransformerInterface;
use FastNorth\PropertyMapper\Map\Link;

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
     * Map a property
     *
     * @param string $from
     * @param string $to
     * @param TransformerInterface $transformer
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
}
