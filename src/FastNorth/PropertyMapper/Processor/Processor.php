<?php

namespace FastNorth\PropertyMapper\Processor;

use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

/**
 * Processor
 *
 * Processes maps
 */
abstract class Processor
{
    /**
     * Property accessor
     *
     * @var PropertyAccessorInterface
     */
    protected $propertyAccess;

    /**
     * Constructor
     *
     * @var PropertyAccessorInterface $propertyAccess
     */
    public function __construct(PropertyAccessorInterface $propertyAccess)
    {
        $this->propertyAccess = $propertyAccess;
    }
}

