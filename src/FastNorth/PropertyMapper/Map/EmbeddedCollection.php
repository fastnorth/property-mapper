<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\MapInterface;

/**
 * EmbeddedCollection
 *
 * An embedded collection
 */
class EmbeddedCollection extends Link implements EmbeddedCollectionInterface
{
    /**
     * The map
     *
     * @var MapInterface
     */
    private $map;

    /**
     * The generator
     *
     * @var callable
     */
    private $generator;

    /**
     * Constructor
     *
     * @param string $from
     * @param string $to
     * @param MapInterface $map
     */
    public function __construct($from, $to, MapInterface $map, callable $generator)
    {
        parent::__construct($from, $to);

        $this->map       = $map;
        $this->generator = $generator;
    }

    /**
     * @inheritDoc
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @inheritDoc
     */
    public function getGenerator()
    {
        return $this->generator;
    }
}

