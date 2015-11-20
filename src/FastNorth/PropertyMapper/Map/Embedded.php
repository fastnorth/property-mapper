<?php

namespace FastNorth\PropertyMapper\Map;

use FastNorth\PropertyMapper\MapInterface;
use FastNorth\PropertyMapper\FactoryInterface;

/**
 * Embedded.
 *
 * Embedded entity
 */
class Embedded implements EmbeddedInterface
{
    /**
     * "To" endpoint.
     *
     * @var string
     */
    private $to;

    /**
     * Map.
     *
     * @var MapInterface
     */
    private $map;

    /**
     * Factory.
     *
     * @var FactoryInterface
     */
    private $factory;

    /**
     * Constructor.
     *
     * @param string           $to
     * @param MapInterface     $map
     * @param FactoryInterface $factory
     */
    public function __construct($to, MapInterface $map, FactoryInterface $factory)
    {
        $this->to      = $to;
        $this->map     = $map;
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * {@inheritdoc}
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * {@inheritdoc}
     */
    public function getFactory()
    {
        return $this->factory;
    }
}
