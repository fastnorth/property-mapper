<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\FactoryInterface;
use FastNorth\PropertyMapper\MapInterface;

/**
 * EmbeddedCollection
 *
 * An embedded collection
 */
class EmbeddedCollection extends AbstractLink implements EmbeddedCollectionInterface
{
    /**
     * The map
     *
     * @var MapInterface
     */
    private $map;

    /**
     * The factory
     *
     * @var FactoryInterface
     */
    private $factory;

    /**
     * Constructor
     *
     * @param string           $from
     * @param string           $to
     * @param MapInterface     $map
     * @param FactoryInterface $factory
     */
    public function __construct($from, $to, MapInterface $map, FactoryInterface $factory)
    {
        parent::__construct($from, $to);

        $this->map     = $map;
        $this->factory = $factory;
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
    public function getFactory()
    {
        return $this->factory;
    }
}
