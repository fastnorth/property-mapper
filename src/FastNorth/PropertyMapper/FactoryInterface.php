<?php

namespace FastNorth\PropertyMapper;

/**
 * FactoryInterface.
 *
 * Object factory
 */
interface FactoryInterface
{
    /**
     * Factory method.
     *
     * @param mixed $context
     *
     * @return mixed
     */
    public function factory($context);

    /**
     * "Reverse" factory method.
     *
     * @param mixed $context
     *
     * @return mixed
     */
    public function reverse($context);
}
